<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Announcement;
use Auth;

class DashboardPartnerController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', Auth::user()->id);
        $totalEvent = $events->count();
        $totalTransaksi = Transaction::whereHas('event', function ($query) {
            return $query->where('user_id', '=', Auth::user()->id);
        })->sum('item_price');
        $totalPeserta = Transaction::whereHas('event', function ($query) {
            return $query->where('user_id', '=', Auth::user()->id);
        })->count();
        // announcements
        return view('partner.dashboard', [
            'totalEvent' => $totalEvent,
            'totalPeserta' => $totalPeserta,
            'totalSaldo' => number_format($totalTransaksi),
            'announcements' => Announcement::where('type', 'partner')->latest()->get()
        ]);
    }
}
