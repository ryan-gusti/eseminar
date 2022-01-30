<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = User::query();
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('admin.users.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('admin.users.destroy', $item->id).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm(\'Anda Yakin?\')"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('role', function($item){
                                    if($item->role == 'admin') {
                                        return '<span class="badge badge-glow bg-primary">ADMIN</span>';
                                    } elseif ($item->role == 'partner') {
                                        return '<span class="badge badge-glow bg-info">PARTNER</span>';
                                    } elseif ($item->role == 'user') {
                                        return '<span class="badge badge-glow bg-secondary">USER</span>';
                                    }
                                })
                                ->editColumn('email_verified_at', function($item){
                                    if(!$item->email_verified_at) {
                                        return '<span class="badge badge-glow bg-danger">Unverified</span>';
                                    } else {
                                        return '<span class="badge badge-glow bg-success">Verified</span>';
                                    }
                                })
                                ->rawColumns(['role','email_verified_at', 'action'])
                                ->make(true);
        }

        return view('admin.list-users');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.edit-user', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validasi inputan update
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users,phone,'.$user->id,
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'role' => 'required|string'
        ];

        //menyimpan ke dalam variabel data
        $data = $request->validate($rules);

        //cek kondisi jika ada inputan ubah password
        if ($request->password) {
            //jika ada, input ke dalam variabel data
            $data['password'] = Hash::make($request->password);
        }

        //melakukan update user dengan where id user
        User::where('id', $user->id)
                ->update($data);

        //kasih alert success dan redirect
        Alert::success('Berhasil', 'Ubah Data User Berhasil!');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // kirim alert dan redirect
        Alert::success('Berhasil!', 'User telah dihapus!');
        return redirect(route('admin.users.index'));
    }
}
