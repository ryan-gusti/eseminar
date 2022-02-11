<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class DashboardUserController extends Controller
{
    public function index() {
        return view('user.dashboard', [
            'announcements' => Announcement::where('type', 'user')->latest()->get()
        ]);
    }
}
