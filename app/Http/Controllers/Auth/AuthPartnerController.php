<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthPartnerController extends Controller
{
    public function login()
    {
        return view('auth.partner.login');
    }
}
