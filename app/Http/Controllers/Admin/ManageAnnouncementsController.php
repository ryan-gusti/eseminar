<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class ManageAnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Announcement::query();
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('admin.announcements.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('admin.announcements.destroy', $item->id).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('type', function($item){
                                    if($item->type == 'partner') {
                                        return '<span class="badge badge-glow bg-info">PARTNER</span>';
                                    } elseif ($item->type == 'user') {
                                        return '<span class="badge badge-glow bg-secondary">USER</span>';
                                    }
                                })
                                ->editColumn('created_at', function ($item) {
                                    return date('l d F Y', strtotime($item->created_at));
                                })
                                ->rawColumns(['type','action'])
                                ->make(true);
        }

        return view('admin.announcements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ([
            'title' => 'required|max:50',
            'type' => 'required|string',
            'body' => 'required|max:100'
        ]);

        $data = $request->validate($rules);

        Announcement::create($data);
        Alert::success('Berhasil!', 'Sukses membuat informasi!');
        return redirect(route('admin.announcements.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $rules = ([
            'title' => 'required|max:50',
            'type' => 'required|string',
            'body' => 'required|max:100'
        ]);

        $data = $request->validate($rules);
        $announcement->update($data);
        Alert::success('Berhasil', 'Ubah Informasi Berhasil!');
        return redirect(route('admin.announcements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        // kirim alert dan redirect
        Alert::success('Berhasil!', 'Informasi telah dihapus!');
        return redirect(route('admin.announcements.index'));
    }
}
