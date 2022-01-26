<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthPartnerController extends Controller
{
    public function login()
    {
        return view('auth.partner.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'partner') {
                return redirect()->intended('/partner/home');
            } else {
                Auth::logout();
                Alert::error('Login Gagal!', 'Anda bukan Partner ESeminar');
                return back();
            }
        } else {
            return redirect()->back()->with('loginError', 'Username atau Password Salah!');
        }
    }
}
