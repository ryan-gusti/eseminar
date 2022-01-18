<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Auth;

class UserController extends Controller
{
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
            'email_verified_at' => now(),
        ];
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        return redirect(route('home'));
    }

    public function edit_profile()
    {
        return view('user.edit-profile');
    }

    public function update_profile(Request $request) 
    {
        $data = $request->validate([
            'name' => ['string', 'required', 'max:255'],
            'phone' => ['numeric', 'required', 'unique:users,phone,'. auth()->id()]
        ]);

        Auth::user()->update($data);

        return back()->with('message', 'Edit Profile Berhasil!');
    }

    public function edit_password()
    {
        return view('user.edit-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Password anda salah!'
            ]);
        }

        auth()->user()->update(['password' => Hash::make($request->password)]);
        return back()->with('message', 'Password anda berhasil diubah!');
    }

}
