<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Http\Request;
use Midtrans;
use Auth;
use Alert;
use Str;
use Exception;

class CheckoutController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');

    }

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
        $total = Transaction::where('event_id', $event->id)->where('payment_status', 'paid')->count();
        // cek apakah masih tersedia dengan compare kedua value trsb
        if ($total === $quota) {
            Alert::error('Gagal', 'Kouta event ini sudah penuh!');
            return redirect(route('events'));
        }

        $data = [
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'item_price' => $event->price
        ];

        $transaction = Transaction::create($data);
        // cek jika event gratis
        if ($event->price == '0') {
            // merubah status menjadi paid
            $transaction->payment_status = 'paid';
            // membuat id transaksi
            $orderId = 'INV-'.$transaction->id.'-'.Str::random(5);
            $transaction->midtrans_booking_code = $orderId;
            $transaction->save();
            return view('user.success-checkout');
        }

        // return view('user.success-checkout', [
        //     'event' => $event
        // ]);
        // return redirect($paymentUrl);

        $orderId = 'INV-'.$transaction->id.'-'.Str::random(5);
        $price = $transaction->event->price;
        $transaction->midtrans_booking_code = $orderId;

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $price
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => 1,
            'name' => "Pembayaran untuk Event ID {$transaction->event->id}"
        ];

        $customer_details = [
            "first_name" => $transaction->user->name,
            "email" => $transaction->user->email,
            "phone" => $transaction->user->phone,
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        try {
            // get snap payment url
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $transaction->midtrans_url = $paymentUrl;
            $transaction->save();

            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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

    public function success(Transaction $transaction)
    {
        return view('user.success-checkout');
    }

    /**
    * Midtrans Callback
    */

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $transaction_id = explode('-', $notif->order_id)[1];
        $transaction = Transaction::findOrFail($transaction_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'challenge'
            $transaction->payment_status = 'pending';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'success'
            $transaction->payment_status = 'paid';
            }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaction->payment_status = 'failed';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaction->payment_status = 'failed';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaction->payment_status = 'failed';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $transaction->payment_status = 'paid';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transaction->payment_status = 'pending';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaction->payment_status = 'expire';
        }

        $transaction->save();
        return view('user.success-checkout');
        // $transaction = Transaction::find($transaction_id)->with('event')->get();
        // $title = $transaction[0]['event']['title']; 
        // return view('user.success-checkout', [
        //     'title' => $title
        // ]);
    }
}
