<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class ManageTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
        $query = Transaction::query()->with('user', 'event');
        return Datatables::of($query)
                            ->addIndexColumn()
                            ->addColumn('action', function($item){
                                return '
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="'.route('admin.transactions.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                        <form action="'.route('admin.users.destroy', $item->id).'" method="POST" class="btn-group">
                                        '. method_field('delete'). csrf_field().'
                                        <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                ';
                            })
                            ->editColumn('item_price', function($item){
                                if ($item->item_price == 0) {
                                    return 'GRATIS';
                                } else {
                                    return 'Rp'.number_format($item->item_price);
                                }
                            })
                            ->editColumn('payment_status', function($item){
                                if($item->payment_status == 'paid') {
                                    return '<span class="badge badge-glow bg-success">Pembayaran Berhasil</span>';
                                } elseif ($item->payment_status == 'pending') {
                                    return '<span class="badge badge-glow bg-warning">Pembayaran Pending</span>';
                                } else if ($item->payment_status == 'failed') {
                                    return'<span class="badge badge-glow bg-danger">Pembayaran Gagal</span>';
                                } elseif ($item->payment_status == 'expire') {
                                    return '<span class="badge badge-glow bg-secondary">Pembayaran Expire</span>';
                                } else {
                                    return '<span class="badge badge-glow bg-primary">Menunggu Pembayaran</span>';
                                }
                            })
                            ->editColumn('created_at', function($item){
                                    return date("d F Y H:i:s", strtotime($item->created_at));
                                })
                            ->rawColumns(['payment_status', 'action'])
                            ->make(true);
        }

        return view('admin.transactions.index');
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
        return view('admin.transactions.edit', [
            'transaction' => $transaction
        ]);
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
        $rules = [
            'payment_status' => 'required|string'
        ];

        //menyimpan ke dalam variabel data
        $data = $request->validate($rules);

        //melakukan update transaksi dengan where id transaksi
        Transaction::where('id', $transaction->id)
                ->update($data);
        // $transaction->update($data);

        //kasih alert success dan redirect
        Alert::success('Berhasil', 'Ubah Transaksi Berhasil!');
        return redirect(route('admin.transactions.index'));
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
