<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Alert;
use Auth;

class ManageEventsController extends Controller
{

    public function __construct() {
        // untuk validasi tanggal
        $this->dateValidation = Carbon::today()->toDateString();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $event)
    {
        // $query = Event::query()->with('user','categories')->get();
        // return $query;
        if($request->ajax()) {
            $query = Event::query()->with('user');
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('event', $item->slug).'" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="'.route('admin.events.edit', $item->slug).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('admin.events.destroy', $item->slug).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm(\'Anda Yakin?\')"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('status', function($item){
                                    if($item->status == 'open') {
                                        return '<span class="badge badge-glow bg-success">Open</span>';
                                    } elseif ($item->status == 'pending') {
                                        return '<span class="badge badge-glow bg-warning">Pending</span>';
                                    } elseif ($item->status == 'rejected') {
                                        return '<span class="badge badge-glow bg-danger">Rejected</span>';
                                    } else {
                                        return '<span class="badge badge-glow bg-secondary">Closed</span>';
                                    }
                                })
                                ->editColumn('user_id', function($item){
                                    return $item->user->name;
                                })
                                ->editColumn('quota', function($item){
                                    return $item->quota.' Peserta';
                                })
                                ->rawColumns(['status', 'action', 'categories'])
                                ->make(true);
        }

        return view('admin.list-events');
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
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        // return $event->with('user')->first();
        // return $event->with('user');
        $decode = base64_decode($event->description);
        return view('admin.edit-event', [
            'event' => $event,
            'description' => $decode,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = ([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events,slug,'.$event->id,
            'description' => 'required',
            // 'banner' => 'required|image',
            'quota' => 'required|numeric',
            'time' => 'required|after_or_equal:'.$this->dateValidation,
            'price' => 'required|numeric',
            'category_id' => 'required|array',
            'type' => 'required|string',
            'location_link' => 'required|string',
            'status' => 'required|string'
        ]);

        //menyimpan ke dalam variabel data
        $data = $request->validate($rules);
        $data['description'] = base64_encode($request->description);
        if($request->file('banner')) {
            if($event->banner) {
                Storage::delete($event->banner);
            }
            $data['banner'] = $request->file('banner')->store('banner-event');
        }
        $event->update($data);

        //update kategori
        $event->categories()->sync($data['category_id']);

        Alert::success('Berhasil', 'Ubah Event Berhasil!');
        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
