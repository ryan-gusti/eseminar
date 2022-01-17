@extends('layouts.backend.auth.main')

@section('content')
<div class="auth-content my-auto">
    <div class="text-center">
        <div class="avatar-lg mx-auto">
            <div class="avatar-title rounded-circle bg-light">
                <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
            </div>
        </div>
        <div class="p-2 mt-4">
            <h4>Verifikasi Email</h4>
            <p>Anda berhasil terdaftar, selanjutnya silahkan klik link verifikasi yang telah kami kirim ke email yang didaftarkan</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="mt-4">
                    <p class="text-muted mb-2">Tidak menerima email ?</p>
                    {{-- <a href="/" class="btn btn-primary w-10">Kirim ulang email verifikasi</a> --}}
                    <button type="submit" class="btn btn-primary w-10">Kirim ulang email verifikasi</button>
                </div>
            </form>
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mt-2">
                <span>Email verifikasi telah dikirim ulang, silahkan dicek!</span>
            </div>
        @endif
        </div>
    </div>
    <div class="mt-4 text-center">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="text-primary fw-semibold"> Log Out </a>
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
        </form> 
    </div>
</div>
@endsection