<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Http\Request;
use Auth;
use Alert;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        if ($event->isRegistered) {
            Alert::error('Gagal!', 'Kamu sudah terdaftar dievent ini!');
            return redirect(route('user.tickets'));
        }
        return view('user.checkout', [
            'event' => $event
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        // validasi qouta event
        // get value qouta event
        $quota = $event->quota;
        // count total peserta yang terdaftar
        $total = Transaction::where('event_id', $event->id)->count();
        // cek apakah masih tersedia dengan compare kedua value trsb
        if ($total === $quota) {
            Alert::error('Gagal', 'Kouta event ini sudah penuh!');
            return redirect(route('events'));
        }

        $data = [
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'is_paid' => 1,
            'item_price' => $event->price
        ];
        $checkout = Transaction::create($data);
        Alert::success('Sukses!', 'Transaksi Berhasil!');
        return redirect(route('user.tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
