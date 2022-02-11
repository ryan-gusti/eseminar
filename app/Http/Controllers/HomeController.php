<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $totalEvents = Event::all()->count();
        $totalUsers = User::all()->count();
        $totalTransactions = Transaction::all()->count();
        // return $totalTransactions;
        return view('home.index', [
            'categories' => Category::all(),
            'totalEvents' => $totalEvents,
            'totalUsers' => $totalUsers,
            'totalTransactions' => $totalTransactions
        ]);
    }
}
