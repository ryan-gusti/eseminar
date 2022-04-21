<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\EventCertificate;
use App\Models\Certificate;
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
            $query = EventCertificate::query()->where('event_id', $event->id)->with('event');
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn-group" data-fancybox="sertifikat-preview" data-src="'.url('storage/certificate-event/'.$item->event->slug.'/'.$item->sertifikat).'">
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
                                    return '
                                    <img src='.url('storage/certificate-event/'.$item->event->slug.'/'.$item->ttd_pelaksana).' height="50">
                                    ';
                                })
                                ->editColumn('ttd_pemateri', function($item){
                                    return '
                                   <img src='.url('storage/certificate-event/'.$item->event->slug.'/'.$item->ttd_pemateri).' height="50">
                                    ';
                                })
                                ->editColumn('logo', function($item){
                                    return '
                                    <img src='.url('storage/certificate-event/'.$item->event->slug.'/'.$item->logo).' height="50">
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
        //get master certificate
        $certificate = Certificate::where('status', 'active')->first();
        $time = date("d F Y", strtotime($event->time));
        $cert = 'certificate-event/';
        $path_cert = base_path('public/storage/master-certificates/');
        $path = base_path('public/storage/certificate-event/');
        //ttd width 362px height 150px  png
        //logo width 150px height 87px png
        $validatedData = $request->validate([
            'ketua_pelaksana' => 'required|string',
            'ttd_pelaksana' => 'required|image|mimes:png|dimensions:max_width=362,max_height=150',
            'pemateri' => 'required|string',
            'ttd_pemateri' => 'required|image|mimes:png|dimensions:max_width=362,max_height=150',
            'no_certificate' => 'required|string',
            'logo' => 'image|mimes:png|dimensions:max_width=150,max_height=87'
        ]);

        $validatedData['event_id'] = $event->id;

        $ttdPelaksana = $request->file('ttd_pelaksana');
        $ttdPelaksana->store($cert.$event->slug);
        $validatedData['ttd_pelaksana'] = $ttdPelaksana->hashName();

        $ttdPemateri = $request->file('ttd_pemateri');
        $ttdPemateri->store($cert.$event->slug);
        $validatedData['ttd_pemateri'] = $ttdPemateri->hashName();

        $logo = $request->file('logo');
        $logo->store($cert.$event->slug);
        $validatedData['logo'] = $logo->hashName();

        $img = Image::make($path_cert.$certificate->code.'/'.$certificate->file_certificate);
        $img->insert($path.$event->slug.'/'.$validatedData['ttd_pelaksana'], 'center', -250, 380);
        $img->insert($path.$event->slug.'/'.$validatedData['ttd_pemateri'], 'center', 270, 380);
        $img->insert($path.$event->slug.'/'.$validatedData['logo'], 'center', 570, -500);
        $img->text($validatedData['ketua_pelaksana'], 680, 1115, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(25);
            $font->color($certificate->font_colour['ketua_pemateri']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['pemateri'], 1250, 1115, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(25);
            $font->color($certificate->font_colour['ketua_pemateri']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('"'. $event->title .'"', 960, 700, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(40);
            $font->color($certificate->font_colour['title_time']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($time, 960, 800, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(30);
            $font->color($certificate->font_colour['title_time']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['no_certificate'], 960, 230, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(30);
            $font->color($certificate->font_colour['number_name']);
            $font->align('center');
            $font->valign('top');
        });
        // return $img->response('jpg');
        $sertifikat_name = time().'.jpg';
        $img->save(base_path('public/storage/certificate-event/'.$event->slug.'/'.$sertifikat_name), 100);
        $validatedData['sertifikat'] = $sertifikat_name;

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
        //get master certificate
        $certificate = Certificate::where('status', 'active')->first();
        //inisialisasi varible certificate
        $eventCertificate = EventCertificate::where('id',$id)->with('event')->first();
        $slug = $eventCertificate->event->slug.'/';
        $cert = 'certificate-event/';
        $time = date("d F Y", strtotime($eventCertificate->event->time));
        $path_cert = base_path('public/storage/master-certificates/');
        $path = base_path('public/storage/certificate-event/');

        //validasi rule
        $rules = [
            'ketua_pelaksana' => 'required|string',
            'ttd_pelaksana' => 'image|mimes:png|dimensions:max_width=362,max_height=150',
            'pemateri' => 'required|string',
            'ttd_pemateri' => 'image|mimes:png|dimensions:max_width=362,max_height=150',
            'no_certificate' => 'required|string',
            'logo' => 'image|mimes:png|dimensions:max_width=150,max_height=87'
        ];

        $validatedData = $request->validate($rules);

        $img = Image::make($path_cert.$certificate->code.'/'.$certificate->file_certificate);

        // jika terdapat ada user upload pengganti gambar
        if($request->file('ttd_pelaksana')) {
            Storage::delete($cert.$slug.$eventCertificate->ttd_pelaksana);
            $ttdPelaksana = $request->file('ttd_pelaksana');
            $ttdPelaksana->store($cert.$slug);
            $validatedData['ttd_pelaksana'] = $ttdPelaksana->hashName();
            $img->insert($path.$slug.$validatedData['ttd_pelaksana'], 'center', -250, 380);
        } else {
            $img->insert($path.$slug.$eventCertificate->ttd_pelaksana, 'center', -250, 380);
        }
        if($request->file('ttd_pemateri')) {
            Storage::delete($cert.$slug.$eventCertificate->ttd_pemateri);
            $ttdPemateri = $request->file('ttd_pemateri');
            $ttdPemateri->store($cert.$slug);
            $validatedData['ttd_pemateri'] = $ttdPemateri->hashName();
            $img->insert($path.$slug.$validatedData['ttd_pemateri'], 'center', 270, 380);
        } else {
            $img->insert($path.$slug.$eventCertificate->ttd_pemateri, 'center', 270, 380);
        }
        if($request->file('logo')) {
            Storage::delete($cert.$slug.$eventCertificate->logo);
            $logo = $request->file('logo');
            $logo->store($cert.$slug);
            $validatedData['logo'] = $logo->hashName();
            $img->insert($path.$slug.$validatedData['logo'], 'center', 570, -500);
        } else {
            $img->insert($path.$slug.$eventCertificate->logo, 'center', 570, -500);
        }
        
        $img->text($validatedData['ketua_pelaksana'], 680, 1115, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(25);
            $font->color($certificate->font_colour['ketua_pemateri']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['pemateri'], 1250, 1115, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(25);
            $font->color($certificate->font_colour['ketua_pemateri']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('"'.$eventCertificate->event->title .'"', 960, 700, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(40);
            $font->color($certificate->font_colour['title_time']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($time, 960, 800, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(30);
            $font->color($certificate->font_colour['title_time']);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($validatedData['no_certificate'], 960, 230, function($font) use ($path_cert, $certificate) {
            $font->file($path_cert.$certificate->code.'/'.$certificate->file_font[0]);
            $font->size(30);
            $font->color($certificate->font_colour['number_name']);
            $font->align('center');
            $font->valign('top');
        });

        Storage::delete($cert.$slug.$eventCertificate->sertifikat);
        //menyimpan hasil pembuatan diatas
        $sertifikat_name = time().'.jpg';
        $img->save($path.$slug.$sertifikat_name, 100);
        $validatedData['sertifikat'] = $sertifikat_name;

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
