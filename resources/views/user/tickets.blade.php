@extends('layouts.backend.main')

@section('title', 'My Tiket')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Tiket Saya</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Tiket</a>
                                    </li>
                                    <li class="breadcrumb-item active">List Tiket
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
                    @forelse ($tickets as $ticket)
                        {{-- {{ dd($ticket->event->certificate->sertifikat) }} --}}
                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    {{-- <img src="{{ asset('backend/app-assets/images/illustration/email.svg') }}" alt="Meeting Pic" height="170" /> --}}
                                    @if (!$ticket->event->banner)
                                        <img src="{{ asset('storage/deleted-event.png') }}" alt="Meeting Pic" height="200"
                                            class="img-fluid" />
                                    @else
                                        <img src="{{ asset('storage/' . $ticket->event->banner) }}" alt="Meeting Pic"
                                            height="200" class="img-fluid" />
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">{{ date('D', strtotime($ticket->event->time)) }}
                                            </h6>
                                            <h3 class="mb-0">{{ date('j', strtotime($ticket->event->time)) }}
                                            </h3>
                                        </div>
                                        <div class="my-auto">
                                            {{-- <h4 class="card-title mb-25">{{ $ticket->event->title }}</h4> --}}
                                            <a href="{{ route('event', $slug = $ticket->event->slug) }}">
                                                <h4 class="card-title mb-25">{{ $ticket->event->title }}</h4>
                                            </a>
                                            <p class="card-text mb-0">Webinar</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">
                                                {{ date('l d F Y', strtotime($ticket->event->time)) }}</h6>
                                            <small>{{ date('H:m', strtotime($ticket->event->time)) }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1 d-flex align-items-center">
                                            <div class="avatar-content">
                                                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">{{ $ticket->event->location_link }}</h6>
                                            <small class="text-capitalize">{{ $ticket->event->type }}</small>
                                        </div>
                                    </div>
                                    {{-- cek apakah event sudah selesai --}}
                                    @if ($ticket->event->status == 'close')
                                        {{-- cek apakah sertifikat sudah dibuat --}}
                                        @if ($ticket->event->certificate)
                                            <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                                <a href="{{ route('user.certificate', $ticket->event->slug) }}"
                                                    class="btn btn-block btn-success">
                                                    <i data-feather="award" class="me-25"></i>
                                                    <span>E-Sertifikat</span>
                                                </a>
                                            </div>
                                        @else
                                            <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                                <a href="#" class="btn btn-block btn-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="E-Sertifikat Belum Tersedia">
                                                    <i data-feather="award" class="me-25"></i>
                                                    <span>E-Sertifikat</span>
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                            <a href="#" class="btn btn-block btn-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Event Belum Berakhir">
                                                <i data-feather="award" class="me-25"></i>
                                                <span>E-Sertifikat</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->
                    @empty
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Belum ada Tiket 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 Sepertinya kamu belum pernah mendaftar event.</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('events') }}">Cari
                                    Event</a><br><img class="img-fluid"
                                    src="{{ asset('backend/app-assets/images/pages/error.svg') }}" alt="Error page" />
                            </div>
                        </div>
                    @endforelse
                </div>

                <!--/ Card Advance -->

            </div>
        </div>
    </div>
@endsection
