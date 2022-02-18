@extends('layouts.backend.main')

@section('title', 'Pemesanan Tiket Berhasil!')

@section('content')
    @section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Card Advance -->
                <div class="row match-height">
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center" style="margin-top: -20px;">
                                <h2 class="mb-1">Pemesanan Tiket Berhasil! 🤟🏻</h2>
                                <img src="{{ asset('storage/success.png') }}" class="img-fluid">
                                {{-- <h5 class="mb-2">Pemesanan Tiket Untuk Event <b>"{{ $title }}"</b> Berhasil
                                    Klik tombol dibawah untuk melihat tiket kamu</h5><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.tickets') }}">Lihat
                                    Tiket</a><br> --}}
                                <h5 class="mb-2">Pemesanan Tiket Event Berhasil
                                    Klik tombol dibawah untuk melihat tiket kamu</h5><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.tickets') }}">Lihat
                                    Tiket</a><br>
                            </div>
                        </div>
                </div>

                <!--/ Card Advance -->

            </div>
        </div>
    </div>
@endsection
@endsection