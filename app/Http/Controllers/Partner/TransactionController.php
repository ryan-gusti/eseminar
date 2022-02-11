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
            $query = Transaction::query()->where('event_id', $event->id)->with('user');
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->editColumn('created_at', function($item){
                                    return $time = date("d F Y H:i:s", strtotime($item->created_at));;
                                })
                                ->editColumn('status', function($item){
                                    if($item->is_paid == 1) {
                                        return '<span class="badge badge-glow bg-success">SUDAH BAYAR</span>';
                                    } else {
                                        return '<span class="badge badge-glow bg-danger">BELUM BAYAR</span>';
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
                                ->rawColumns(['action', 'status'])
                                ->make(true);
        }

        return view('partner.transaction.list-transaction');
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
}
