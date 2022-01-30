<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthAdminController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admin/home');
            } else {
                Auth::logout();
                Alert::error('Login Gagal!', 'Anda bukan Admin ESeminar');
                return back();
            }
        } else {
            return redirect()->back()->with('loginError', 'Username atau Password Salah!');
        }
    }
}
