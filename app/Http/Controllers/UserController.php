<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Event;
use App\Models\Certificate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use App\Models\Transaction;
use Alert;
use Auth;
use Illuminate\Support\Facades\Redis;
use Image;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class UserController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'picture' => $callback->getAvatar(),
            'email_verified_at' => now(),
        ];
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        return redirect(route('user.dashboard'));
    }

    public function edit_profile()
    {
        return view('pages.edit-profile');
    }

    public function update_profile(Request $request) 
    {
        $data = $request->validate([
            'name' => ['string', 'required', 'max:255'],
            'phone' => ['numeric', 'required', 'unique:users,phone,'. auth()->id()],
            'picture' => ['image']
        ]);


        if ($request->file('picture')) {
            if(Auth::user()->picture) {
            Storage::delete('user-image/'.Auth::user()->picture);
            }
            $image = $request->file('picture');
            $image->store('user-image');
            $data['picture'] = $image->hashName();
        }

        Auth::user()->update($data);
        Alert::success('Sukses!', 'Ubah Profil Berhasil!');
        return back();
    }

    public function edit_password()
    {
        return view('pages.edit-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Password anda salah!'
            ]);
        }

        auth()->user()->update(['password' => Hash::make($request->password)]);
        Alert::success('Sukses!', 'Ubah Password Berhasil!');
        return back();
    }

    public function my_tickets()
    {
        $tickets = Transaction::with('event')->where('user_id', Auth::id())->where('payment_status', 'paid')->get();
        return view('user.tickets', [
            'tickets' => $tickets
        ]);
    }

    public function my_certificate(Event $event)
    {
        // get master certificate
        $ms_certificate = Certificate::where('status', 'active')->first();
        // cek apakah user tersebut benar sudah terdaftar di table transaksi
        $certificate = Transaction::with('event')->where('user_id', Auth::id())->where('event_id', $event->id)->first();
        $barcode_body = explode('-', $certificate->invoice)[2];
        $barcode = QrCode::format('png')->size(130)->style('round')->generate(url('/certificate').'/'.$barcode_body);
        if(!$certificate) {
            Alert::error('Gagal!', 'Anda tidak memiliki akses!');
            return redirect(route('user.tickets'));
        }
        // get file sertifikat dan cetak
        $imgCertificate = Event::with('certificate')->where('slug', $event->slug)->first();
        $path = base_path('public/storage/certificate-event/');
        $img = Image::make($path.$event->slug.'/'.$imgCertificate->certificate->sertifikat);
        $img->text(Auth::user()->name, 950, 450, function($font) use ($ms_certificate) {
            $font->file(base_path('public/storage/master-certificates/'.$ms_certificate->code.'/'.$ms_certificate->file_font[1]));
            $font->size(80);
            $font->color($ms_certificate->font_colour['number_name']);
            $font->align('center');
            $font->valign('top');
        });
        $img->response('jpg', 100);

        return view('home.download-certificate', [
            'certificate' => $img,
            'barcode' => $barcode
        ]);
    }

    public function my_transactions()
    {
        $transaction = Transaction::with('event')->where('user_id', Auth::id())->get();
        // return $transaction;
        return view('user.transactions', [
            'transactions' => $transaction
        ]);
    }

    public function delete_transaction($id)
    {
        // cek apakah ini benar transaksi dari user tsb
        $transaction = Transaction::findorFail($id);
        $transaction->payment_status = 'failed';
        $transaction->save();
        Alert::error('Dibatalkan!', 'Transaksi ini telah dibatalkan');
        return redirect(route('user.transactions'));
    }

    public function check_certificate($inv)
    {
        // get master sertifikat
        $ms_certificate = Certificate::where('status', 'active')->first();
        $data = Transaction::where('invoice', 'like', '%'.$inv.'%')->where('payment_status', 'paid')->with('event', 'user')->first();
        // cek kondisi data
        if (!$data) {
            Alert::error('Gagal!', 'Sertifikat tidak ditemukan!');
            return redirect(route('home'));
        }
        $barcode_body = explode('-', $data->invoice)[2];
        $barcode = QrCode::format('png')->size(130)->style('round')->generate(url('/certificate').'/'.$barcode_body);
        $imgCertificate = Event::with('certificate')->where('slug', $data->event->slug)->first();
        $path = base_path('public/storage/certificate-event/');
        $img = Image::make($path.$data->event->slug.'/'.$imgCertificate->certificate->sertifikat);
        $img->text($data->user->name, 950, 450, function($font) use ($ms_certificate) {
            $font->file(base_path('public/storage/master-certificates/'.$ms_certificate->code.'/'.$ms_certificate->file_font[1]));
            $font->size(60);
            $font->color($ms_certificate->font_colour['number_name']);
            $font->align('center');
            $font->valign('top');
        });
        $img->response('jpg', 100);
        // return $img->response('jpg');
        return view('home.check-certificate', [
            'barcode' => $barcode,
            'certificate' => $img,
            'data' => $data
        ]);
    }

}
