@extends('layouts.backend.main')

@section('title', 'Kehadiran Event')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Kehadiran</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Kehadiran Event</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Card Advance -->
                <div class="row match-height">
                        <!-- Developer Meetup Card -->
                        {{-- cek apakah kode absen event valid --}}
                        @if(!$cek_event)
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Event Tidak Ditemukan 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 Sepertinya kamu salah tulis linknya atau event telah dihapus!.</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </div>
                        </div>
                        {{-- cek apakah peserta terdaftar dievent --}}
                        @elseif(!$cek_peserta)
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Kamu Tidak Terdaftar di Event ini! 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 Kamu tidak terdaftar di event ini, silahkan hubungi panitia ya!</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </div>
                        </div>
                        {{-- cek tanggal event sudah dimulai --}}
                        @elseif(strtotime(date('Y-m-d H:i:s')) <= strtotime($cek_event->time))
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Event belum dimulai! 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 event belum membuka sistem kehadiran, mohon ditunggu ya!</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </div>
                        </div>
                        {{-- cek apakah peserta sudah melakukan absensi --}}
                        @elseif($cek_peserta->transactions[0]['presence'] == 'present')
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Kamu Sudah Mengisi Kehadiran! 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 Kamu sudah mengisi kehadiran di event ini kok!</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    {{-- <img src="{{ asset('backend/app-assets/images/illustration/email.svg') }}" alt="Meeting Pic" height="170" /> --}}
                                    @if (!$cek_event->banner)
                                        <img src="{{ asset('storage/deleted-event.png') }}" alt="Meeting Pic" height="200"
                                            class="img-fluid" />
                                    @else
                                        <img src="{{ asset('storage/banner-event/' . $cek_event->banner) }}" alt="Meeting Pic"
                                            height="200" />
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">{{ date('D', strtotime($cek_event->time)) }}
                                            </h6>
                                            <h3 class="mb-0">{{ date('j', strtotime($cek_event->time)) }}
                                            </h3>
                                        </div>
                                        <div class="my-auto">
                                            {{-- <h4 class="card-title mb-25">{{ $ticket->event->title }}</h4> --}}
                                            <a href="{{ route('event', $slug = $cek_event->slug) }}">
                                                <h4 class="card-title mb-25">{{ $cek_event->title }}</h4>
                                            </a>
                                            <p class="card-text mb-0">Webinar</p>
                                        </div>
                                    </div>
                                    <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                                {{-- <a href="{{ route('presence.action', $cek_event->code_presence.'/'.Auth::user()->id) }}"
                                                    class="btn btn-block btn-success">
                                                    <i data-feather="award" class="me-25"></i>
                                                    <span>Saya Hadir!</span>
                                                </a> --}}
                                                //FIXME: fix route url
                                                <a href="{{ url('absen/'.$cek_event->code_presence.'/'.Auth::user()->id.'') }}"
                                                    class="btn btn-block btn-success">
                                                    <i data-feather="award" class="me-25"></i>
                                                    <span>Saya Hadir!</span>
                                                </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endif
                </div>
                <!--/ Card Advance -->
            </div>
        </div>
    </div>
@endsection
