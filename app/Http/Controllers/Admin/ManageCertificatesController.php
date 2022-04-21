<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Alert;
use Str;
use Storage;

class ManageCertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Certificate::query();
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('admin.certificates.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('admin.certificates.destroy', $item->id).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('file_certificate', function($item){
                                    return '
                                    <a class="btn-group" data-fancybox="sertifikat-preview" data-src="'.url('storage/master-certificates/'.$item->code.'/'.$item->file_certificate).'"><img src='.url('storage/master-certificates/'.$item->code.'/'.$item->file_certificate).' height="50"></a>
                                    ';
                                })
                                ->editColumn('font_colour.number_name', function($item){
                                    return '<span style="background-color: '.$item->font_colour['number_name'].'; color: #fff;border-radius: 3px; padding: 3px;">'. $item->font_colour['number_name'].'</span>';
                                })
                                ->editColumn('font_colour.title_time', function($item){
                                    return '<span style="background-color: '.$item->font_colour['title_time'].'; color: #fff;border-radius: 3px; padding: 3px;">'. $item->font_colour['title_time'].'</span>';
                                })
                                 ->editColumn('font_colour.ketua_pemateri', function($item){
                                    return '<span style="background-color: '.$item->font_colour['ketua_pemateri'].'; color: #fff;border-radius: 3px; padding: 3px;">'. $item->font_colour['ketua_pemateri'].'</span>';
                                })
                                ->editColumn('status', function($item){
                                    if($item->status === 'active') {
                                        return '<span class="badge badge-glow bg-success">
                                                <i data-feather="check-circle"></i>
                                                <span>Active</span>
                                                </span>';
                                    } else {
                                        return '<span class="badge badge-glow bg-danger">
                                                <i data-feather="x-circle"></i>
                                                <span>Inactive</span>
                                                </span>';
                                    }
                                })
                                ->rawColumns(['action', 'file_certificate', 'font_colour.number_name','font_colour.title_time','font_colour.ketua_pemateri', 'status'])
                                ->make(true);
        }

        return view('admin.certificates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'file_certificate' => 'required|image|dimensions:min_width=1920,min_height=1280',
            'file_font' => 'required|array|size:2',
            'file_font.*' => 'file',
            'font_colour.*' => 'required'
        ]);
        $files_font = [];
        if ($request->hasFile('file_font')) {
            foreach ($request->file('file_font') as $file ) {
                $name = $file->getClientOriginalName();
                $file->storeAs('master-certificates/'.$request->code, $name);
                $files_font[] = $name;
            }
        }

        $file_certificate = $request->file('file_certificate');
        $name_certificate = time().'.'.$file_certificate->extension();
        $file_certificate->storeAs('master-certificates/'.$request->code, $name_certificate);
        $validatedData['file_certificate'] = $name_certificate;
        $validatedData['file_font'] = $files_font;
        $validatedData['status'] = 'inactive';
        Certificate::create($validatedData);
        Alert::success('Berhasil!', 'Sukses membuat certificate!');
        return redirect(route('admin.certificates.index'));
        // FIXME: add fitur posisi
        // $number = explode(",", $data['position_number']);
        // $logo = explode(",", $data['position_logo']);
        // $position = [];
        // array_push($position, $number, $logo);
        // return $position;
        // return $request->all();
        // $data = $request->all();
        // Certificate::create($data);
        // return 'berhasil';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificate::where('id', $id)->first();
        return view('admin.certificates.edit', [
            'certificate' => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //inisialisasi variable certificate
        $certificate = Certificate::where('id',$id)->first();
        $cert = 'master-certificates/'.$certificate->code.'/'; //baru folder kan gk sama file
        $path = base_path('public/storage/master-certificates/');

        //validasi rule
        $rules = [
            'code' => 'required|string',
            'name' => 'required|string',
            // 'file_certificate' => 'image|dimensions:min_width=1920,min_height=1280',
            'file_certificate' => 'image',
            'file_font' => 'array',
            'file_font.*' => 'file',
            'font_colour.*' => 'required',
            'status' => 'required'
        ];

        $validatedData = $request->validate($rules);
        // cek jika tidak ada sertifikat yang aktif
        if ($request->input('status') == 'inactive') {
            $activeCert = Certificate::where('status', 'active')->whereNotIn('id', array($id))->first();
            if($activeCert) {
                goto process;
                Alert::success('Berhasil!', 'Sukses mengubah sertifikat!');
                return redirect(route('admin.certificates.index'));
            } else {
                Alert::error('Gagal!', 'Harus ada sertifikat yang aktif!');
                return redirect(route('admin.certificates.index'));
            }
        }

        
        if ($request->input('status') == 'active') {
            $activeCert = Certificate::where('status', 'active')->first();
            $activeCert->update(['status' => 'inactive']);
        }

        process:
        if($request->file('file_certificate')) {
            Storage::delete($cert.$certificate->file_certificate);
            $file_certificate = $request->file('file_certificate');
            $name_certificate = time().'.'.$file_certificate->extension();
            $file_certificate->storeAs($cert, $name_certificate);
            $validatedData['file_certificate'] = $name_certificate;
        }

        $files_font = $request->file('file_font');
        $get_current_font = $certificate->file_font;
        $final = $get_current_font;
        if(isset($files_font['master']) && $files_font['master'] != $get_current_font[0]) {
            $hasilAkhirKey0 = $files_font['master']->getClientOriginalName();
            $final = array_replace($get_current_font, ['0' => $hasilAkhirKey0]);
            // delete old font
            Storage::delete($cert.$certificate->file_font[0]);
            // update font name and store
            $fileMaster = $request->file('file_font');
            $file_font_master = $fileMaster['master'];
            $file_font_master->storeAs($cert, $hasilAkhirKey0);
        }
    
        // Check if font name exists then get current Font name.
        if(isset($files_font['name']) && $files_font['name'] != $get_current_font[1]) {
            $hasilAkhirKey1 = $files_font['name']->getClientOriginalName();
            $checkFontName = (isset($final) ? $final : $get_current_font);
            $final = array_replace($checkFontName, ['1' => $hasilAkhirKey1]);
            // delete old font
            Storage::delete($cert.$certificate->file_font[1]);
            // update font name and store
            $fileMaster = $request->file('file_font');
            $file_font_master = $fileMaster['name'];
            $file_font_master->storeAs($cert, $hasilAkhirKey1);
        }

        Certificate::where('id', $id)->update($validatedData);
        if (isset($final) and is_array($final)) {
            Certificate::where('id', $id)->update(['file_font' => $final]);
            Alert::success('Berhasil!', 'Sukses mengubah sertifikat!');
            return redirect(route('admin.certificates.index'));
        }


        // if($files_font['name']) {
        //     return $files_font['name']->getClientOriginalName();
        // }

        // Certificate::where('id', $id)->update($validatedData);
        // Alert::success('Berhasil!', 'Sukses mengubah sertifikat!');
        // return redirect(route('admin.certificates.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //inisialisasi ke model dan directory
        $certificate = Certificate::where('id',$id)->first();
        $directory = 'master-certificates/'.$certificate->code;
        //cek jika sertifikat sedang digunakan
        if ($certificate->status == 'active') {
            Alert::error('Gagal!', 'Template Sertifikat sedang aktif!');
            return redirect(route('admin.certificates.index'));
        }

        //delete kolom db
        $certificate->delete();
        //delete folder certificate event
        Storage::deleteDirectory($directory);

        // kirim alert dan redirect
        Alert::success('Berhasil!', 'Template Sertifikat telah dihapus!');
        return redirect(route('admin.certificates.index'));
    }
}
