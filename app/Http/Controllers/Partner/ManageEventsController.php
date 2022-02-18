<?php

namespace App\Http\Controllers\Partner;

use App\Models\Event;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use Carbon\Carbon;
use Alert;


class ManageEventsController extends Controller
{
    public function __construct() 
    {
        // untuk validasi tanggal
        $this->dateValidation = Carbon::today()->toDateString();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Event::query()->where('user_id', Auth::user()->id)->with('transactions');
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('menu', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('partner.events.certificate.index', $item->slug).'" class="btn btn-primary"><i class="fas fa-award"></i> Sertifikat</a>
                                            <a href="'.route('partner.events.transaction.index', $item->slug).'" class="btn btn-secondary"><i class="fas fa-users"></i> Peserta</a>
                                        </div>
                                    ';
                                })
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('event', $item->slug).'" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="'.route('partner.events.edit', $item->slug).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('partner.events.destroy', $item->slug).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('status', function($item){
                                    if($item->status == 'open') {
                                        return '<span class="badge badge-glow bg-success">Open</span>';
                                    } elseif ($item->status == 'pending') {
                                        return '<span class="badge badge-glow bg-warning">Pending</span>';
                                    } else {
                                        return '<span class="badge badge-glow bg-danger">Closed</span>';
                                    }
                                })
                                ->editColumn('price', function($item){
                                    return 'Rp '.number_format($item->price);
                                })
                                ->editColumn('quota', function($item){
                                    return $item->transactions->count().'/'. $item->quota.' Peserta';
                                })
                                ->rawColumns(['status', 'action', 'menu'])
                                ->make(true);
        }

        return view('partner.list-event');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('title', 'asc')->get();
        return view('partner.create-event', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cek kondisi untuk harga gratis
        if ($request->price == null) {
            $price = 0;
        } else {
            $price = $request->price;
        }
        // return $price;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events,slug',
            'description' => 'required',
            'banner' => 'required|image',
            'quota' => 'required|numeric',
            'time' => 'required|after_or_equal:'.$this->dateValidation,
            // 'price' => 'required|numeric',
            'location_link' => 'required|string',
            'type' => 'required|string',
            'category_id' => 'required|array'
        ]);

        $decode = base64_encode($request->description);
        $validatedData['price'] = $price;
        $validatedData['description'] = $decode;
        $validatedData['user_id'] = auth()->user()->id;

        $image = $request->file('banner');
        $image->store('banner-event');
        $validatedData['banner'] = $image->hashName();

        $event = Event::create($validatedData);
        $event->categories()->attach($validatedData['category_id']);
        Alert::success('Berhasil!', 'Sukses membuat event');
        return redirect(route('partner.events.index'));
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
        if($event->user_id !== Auth::user()->id) {
            Alert::error('Forbidden!', 'Anda tidak memiliki akses!');
            return redirect(route('partner.events.index'));
        }
       
        $decode = base64_decode($event->description);
        return view('partner.edit-event', [
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
        $timeValidation = Carbon::today()->toDateString();
        $rules = ([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events,slug,'.$event->id,
            'description' => 'required',
            'banner' => 'image',
            'quota' => 'required|numeric',
            'time' => 'required|after_or_equal:'.$this->dateValidation,
            'price' => 'required|numeric',
            'category_id' => 'required|array',
        ]);

        //menyimpan ke dalam variabel data
        $data = $request->validate($rules);
        $data['status'] = $request->status;
        $data['description'] = base64_encode($request->description);
        if($request->file('banner')) {
            if($event->banner) {
                Storage::delete($event->banner);
            }
            $image = $request->file('banner');
            $image->store('banner-event');
            $data['banner'] = $image->hashName();
        }
        $event->update($data);

        //update kategori
        $event->categories()->sync($data['category_id']);

        Alert::success('Berhasil', 'Ubah Event Berhasil!');
        return redirect(route('partner.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // delete pivot category
        $event->categories()->detach($event->category_id);
        // delete image di storage dan set default deleted image
        if($event->banner) {
            Storage::delete($event->banner);
        }
        $data['banner'] = 'banner-event/deleted-event.png';
        $event->update($data);
        // soft delete event
        $event->delete();
        // kirim alert dan redirect
        Alert::success('Berhasil!', 'Event telah dihapus!');
        return redirect(route('partner.events.index'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
