<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function login() {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'picture' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        return redirect(route('home'));

    }

    public function login_sipt(Request $request)
    {
        //ambil data dari request
        $email = $request->email;
        $password = $request->password;
        
        //cek data apa sudah pernah login sebelumnya
        $cek_data = User::where('email', $email)->first();
        if ($cek_data != null) {
            return 'data sudah ada, tidak perlu ke api';
        } else {
           $response = Http::withHeaders([
                        'authorization' => env('API_KEY_SIPT'),
                    ])->post('http://api-gateway.ubpkarawang.ac.id/external/sertifikat/check-user', [
                        'email' => $email,
                        'password' => $password
                    ]);
    
            if($response->status() === 200) {
                $data_sipt = $response->json();
                $data = [
                    'email' => $data_sipt['data']['email'],
                    'name' => $data_sipt['data']['name'],
                    'phone' => $data_sipt['data']['phone'],
                    'password' => Hash::make($request->password),
                ];
                // dd($data);
                $user = User::firstOrCreate(['email' => $data['email']], $data);
                Auth::login($user, true);
                return redirect(route('home'));
            } else {
                return 'email / password sipt salah';
            }
        }


    }
}
