<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.user.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        //ambil data dari request
        $email = $request->email;
        $password = $request->password;
        //validasi
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        //cek apakah mahasiswa ubp atau bukan
        if (preg_match("/@mhs.ubpkarawang.ac.id/", $email)) {
            //jika iya cek data apa sudah pernah login sebelumnya
            $cek_data = User::where('email', $email)->first();
            if ($cek_data != null) {
                //jika sudah ada langsung auth
                if(Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('/user/profile');
                }
                return back()->with('loginError', 'Cek Kembali Email atau Password Anda!');
            } else {
                //jika tidak, request api dan simpan ke db dan auth
                $response = Http::withHeaders([
                            'authorization' => env('API_KEY_SIPT'),
                        ])->post('http://api-gateway.ubpkarawang.ac.id/external/sertifikat/check-user', [
                            'email' => $request->email,
                            'password' => $request->password,
                        ]);
        
                // dd($response);
                if($response->status() === 200) {
                    $data_sipt = $response->json();
                    $data = [
                        'email' => $data_sipt['data']['email'],
                        'name' => $data_sipt['data']['name'],
                        'phone' => $data_sipt['data']['phone'],
                        'email_verified_at' => now(),
                        'password' => Hash::make($request->password),
                    ];
                    // dd($data);
                    $user = User::firstOrCreate(['email' => $data['email']], $data);
                    Auth::login($user, true);
                    return redirect(route('home'));
                } else {
                    return back()->with('loginError', 'Email atau Password SIPT Anda Salah!');
                }
            }
        } else {
            $request->authenticate();
    
            $request->session()->regenerate();
    
            return redirect()->intended(RouteServiceProvider::HOME)->with('greet', 'Selamat Datang '. auth()->user()->name.'!');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
