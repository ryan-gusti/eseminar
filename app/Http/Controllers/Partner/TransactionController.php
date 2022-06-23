<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Event;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Event $event)
    {
        // $query = Transaction::query()->where('event_id', $event->id)->with('user')->get();
        // return $query;
        if($request->ajax()) {
            $query = Transaction::query()->where('event_id', $event->id)->where('payment_status', 'paid')->with('user');
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->editColumn('created_at', function($item){
                                    return date("d F Y H:i:s", strtotime($item->created_at));
                                })
                                ->editColumn('status', function($item){
                                        return '<span class="badge badge-glow bg-success">SUDAH BAYAR</span>';
                                })
                                ->editColumn('presence', function($item){
                                        if ($item->presence == 'present') {
                                            return '<span class="badge badge-glow bg-success">HADIR</span>';
                                        } else {
                                            return '<span class="badge badge-glow bg-danger">TIDAK HADIR</span>';
                                        }
                                })
                                ->addColumn('action', function($item){
                                    return '
                                            <form action="'.route('partner.transaction.destroy', $item->id).'" method="POST">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i> Hapus Peserta</button>
                                            </form>
                                        ';
                                })
                                ->rawColumns(['action', 'presence', 'status'])
                                ->make(true);
        }

        return view('partner.transaction.list-transaction', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // get slug for redirect
        $data = $transaction->where('id', $transaction->id)->with('event:id,slug')->get();
        $slug = $data[0]['event']['slug'];
        //delete peserta
        $transaction->delete();
        // kirim alert dan redirect
        Alert::success('Berhasil!', 'Peserta telah dihapus!');
        return redirect()->route('partner.events.transaction.index', $slug);
    }

    public function validationQrcode(Request $request)
    {
        //get data absen from db
        $invoice = Transaction::where("invoice", $request->qr_code)->with('user', 'event')->first();
        //jika data tidak ditemukan didalam db
        if (!$invoice) {
            $data = [
            'status' => false,
            'data' => NULL,
            'message' => 'Event Tidak Ditemukan!'
            ];
            return $data;
        }
        //cek apakah event sesuai dengan id partner
        if ($request->partner_id != $invoice->event->user_id) {
            $data = [
            'status' => false,
            'data' => NULL,
            'message' => 'Event Tidak Sesuai!'
            ];
            return $data;
        }
        //jika event sesuai dengan id partner update data kehadiran
        $invoice->update(['presence' => 'present']);
        $data = [
            'status' => true,
            'data' => [
                'data' => $invoice, 
                'register' => date('l d F Y H:m', strtotime($invoice->created_at))],
            'message' => 'Berhasil!' 
        ];
        return $data;
    }
}
