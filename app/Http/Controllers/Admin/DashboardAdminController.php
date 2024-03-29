<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Transaction;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // statistik event
        $dataEvent = [];
        $totalEvent = Event::all()->count();
        $totalEventOpen = Event::where('status', 'open')->count();
        $totalEventPending = Event::where('status', 'pending')->count();
        $totalEventReject = Event::where('status', 'rejected')->count();
        $totalEventClose = Event::where('status', 'close')->count();
        array_push($dataEvent, $totalEvent, $totalEventOpen, $totalEventPending, $totalEventReject, $totalEventClose);
        // statistik pengguna
        $dataPengguna = [];
        $totalPengguna = User::all()->count();
        $totalUser = User::where('role', 'user')->count();
        $totalPartner = User::where('role', 'partner')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        array_push($dataPengguna, $totalPengguna, $totalUser, $totalPartner, $totalAdmin);
        // statistik transaksi
        $dataTransaksi = [];
        $totalTransaksi = Transaction::all()->count();
        $totalPaid = Transaction::where('payment_status', 'paid')->count();
        $totalWaiting = Transaction::where('payment_status', 'waiting')->count();
        array_push($dataTransaksi, $totalTransaksi, $totalPaid, $totalWaiting);
        return view('admin.dashboard', [
            'dataEvent' => $dataEvent,
            'dataPengguna' => $dataPengguna,
            'dataTransaksi' => $dataTransaksi
        ]);
    }
}
