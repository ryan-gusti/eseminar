<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\EventCertificate;
use Illuminate\Http\Request;
use App\Models\Event;
use Alert;
use Auth;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ManageEventCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Event $event,EventCertificate $eventCertificate)
    {
        if($event->user_id !== Auth::user()->id) {
            Alert::error('Forbidden!', 'Anda tidak memiliki akses!');
            return redirect(route('partner.events.index'));
        }
        if($request->ajax()) {
            $query = EventCertificate::query()->where('event_id', $event->id);
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    $path = 'http://eseminar.dev/storage/certificate-event/';
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn-group" data-fancybox="sertifikat-preview" data-src='.$path.$item->event->slug.'/sertifikat.jpg>
                                            <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                                            <a href="'.route('partner.certificate.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('partner.certificate.destroy', $item->id).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('ttd_pelaksana', function($item){
                                    $url = 'https://eseminar.dev/storage/';
                                    return '
                                    <img src='.$url.''.$item->ttd_pelaksana.' height="100">
                                    ';
                                })
                                ->editColumn('ttd_pemateri', function($item){
                                    $url = 'https://eseminar.dev/storage/';
                                    return '
                                    <img src='.$url.''.$item->ttd_pemateri.' height="100">
                                    ';
                                })
                                ->editColumn('logo', function($item){
                                    $url = 'https://eseminar.dev/storage/';
                                    return '
                                    <img src='.$url.''.$item->logo.' height="100">
                                    ';
                                })
                                ->rawColumns(['action', 'ttd_pelaksana','ttd_pemateri', 'logo'])
                                ->make(true);
        }

        return view('partner.certificate.list-certificate', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event,EventCertificate $eventCertificate)
    {
        if($event->user_id !== Auth::user()->id) {
            Alert::error('Forbidden!', 'Anda tidak memiliki akses!');
            return redirect(route('partner.events.index'));
        }
        //validasi apakah user sudah pernah membuat sertifikat
        if ($eventCertificate->where('event_id', $event->id)->exists()) {
            Alert::error('Gagal!', 'Kamu sudah membuat sertifikat event ini!');
            return back();
        }
        //jika belum maka diarahkan ke halaman create
        return view('partner.certificate.add-certificate', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $time = date("d F Y", strtotime($event->time));
        $path = base_path('public/storage/');

        $validatedData = $request->validate([
            'ketua_pelaksana' => 'required|string',
            'ttd_pelaksana' => 'required|image',
            'pemateri' => 'required|string',
            'ttd_pemateri' => 'required|image',
            'logo' => 'required|image'
        ]);

        $validatedData['event_id'] = $event->id;
        $validatedData['ttd_pelaksana'] = $request->file('ttd_pelaksana')->store('certificate-event/'.$event->slug);
        $validatedData['ttd_pemateri'] = $request->file('ttd_pemateri')->store('certificate-event/'.$event->slug);
        $validatedData['logo'] = $request->file('logo')->store('certificate-event/'.$event->slug);

        $img = Image::make($path.'certificate-event/master.jpg');
        $img->insert($path.$validatedData['ttd_pelaksana'], 'center', -400, 455);
        $img->insert($path.$validatedData['ttd_pemateri'], 'center', 550, 455);
        $img->text($validatedData['ketua_pelaksana'], 510, 1215, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['pemateri'], 1500, 1215, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($time, 1100, 830, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(40);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($event->title, 1320, 780, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(40);
            $font->color('#ffffff');
            $font->align('right');
            $font->valign('top');
        });
        // return $img->response('jpg');
        $img->save(base_path('public/storage/certificate-event/'.$event->slug.'/sertifikat.jpg'), 100);
        $validatedData['sertifikat'] = 'certificate-event/'.$event->slug.'/sertifikat.jpg';

        $event = EventCertificate::create($validatedData);
        Alert::success('Berhasil!', 'Sukses membuat certificate!');
        return redirect(route('partner.events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventCertificate  $eventCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(EventCertificate $eventCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventCertificate  $eventCertificate
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $eventCertificate = EventCertificate::where('id',$id)->with('event')->first();
        if($eventCertificate->event->user_id !== Auth::user()->id) {
            Alert::error('Forbidden!', 'Anda tidak memiliki akses!');
            return redirect(route('partner.events.index'));
        }
        return view('partner.certificate.edit-certificate', [
            'eventCertificate' => $eventCertificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventCertificate  $eventCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventCertificate $eventCertificate, $id)
    {
        //inisialisasi varible certificate
        $eventCertificate = EventCertificate::where('id',$id)->with('event')->first();
        $time = date("d F Y", strtotime($eventCertificate->event->time));
        $path = base_path('public/storage/');

        //validasi rule
        $rules = [
            'ketua_pelaksana' => 'required|string',
            'pemateri' => 'required|string',
            'ttd_pelaksana' => 'image',
            'ttd_pemateri' => 'image',
            'logo' => 'image'
        ];

        $validatedData = $request->validate($rules);

        $img = Image::make($path.'certificate-event/master.jpg');

        if($request->file('ttd_pelaksana')) {
            Storage::delete($eventCertificate->ttd_pelaksana);
            $validatedData['ttd_pelaksana'] = $request->file('ttd_pelaksana')->store('certificate-event/'.$eventCertificate->event->slug);
            $img->insert($path.$validatedData['ttd_pelaksana'], 'center', -400, 455);
        } else {
            $img->insert($path.$eventCertificate->ttd_pelaksana, 'center', -400, 455);
        }
        if($request->file('ttd_pemateri')) {
            Storage::delete($eventCertificate->ttd_pemateri);
            $validatedData['ttd_pemateri'] = $request->file('ttd_pemateri')->store('certificate-event/'.$eventCertificate->event->slug);
            $img->insert($path.$validatedData['ttd_pemateri'], 'center', 550, 455);
        } else {
            $img->insert($path.$eventCertificate->ttd_pemateri, 'center', 550, 455);
        }
        if($request->file('logo')) {
            Storage::delete($eventCertificate->logo);
            $validatedData['logo'] = $request->file('logo')->store('certificate-event/'.$eventCertificate->event->slug);
        }
        
        $img->text($validatedData['ketua_pelaksana'], 510, 1215, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['pemateri'], 1500, 1215, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($time, 1100, 830, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(40);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('top');
        });
        $img->text($eventCertificate->event->title, 1320, 780, function($font) {
            $font->file(base_path('public/storage/certificate-event/font/Montserrat-Regular.ttf'));
            $font->size(40);
            $font->color('#ffffff');
            $font->align('right');
            $font->valign('top');
        });

        //menyimpan hasil pembuatan diatas
        $img->save(base_path('public/storage/certificate-event/'.$eventCertificate->event->slug.'/sertifikat.jpg'), 100);
        $validatedData['sertifikat'] = 'certificate-event/'.$eventCertificate->event->slug.'/sertifikat.jpg';

        //update database dan redirect
        EventCertificate::where('id', $id)->update($validatedData);
        Alert::success('Berhasil!', 'Sukses mengubah certificate!');
        return redirect(route('partner.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventCertificate  $eventCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //inisialisasi ke model dan directory
        $eventCertificate = EventCertificate::where('id',$id)->with('event')->first();
        $directory = 'certificate-event/'.$eventCertificate->event->slug;

        //delete kolom db
        $eventCertificate->delete();
        //delete folder certificate event
        Storage::deleteDirectory($directory);

        // kirim alert dan redirect
        Alert::success('Berhasil!', 'Sertifikat Event telah dihapus!');
        return redirect(route('partner.events.index'));
    }
}
