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
                        <h2 class="content-header-title float-start mb-0">My Ticket</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Card</a>
                                </li>
                                <li class="breadcrumb-item active">Advance Card
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
                            <img src="{{ asset('storage/deleted-event.png') }}" alt="Meeting Pic" height="200" class="img-fluid"/>
                            @else
                            <img src="{{ asset('storage/'.$ticket->event->banner) }}" alt="Meeting Pic" height="200" class="img-fluid"/>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="meetup-header d-flex align-items-center">
                                <div class="meetup-day">
                                    <h6 class="mb-0">THU</h6>
                                    <h3 class="mb-0">24</h3>
                                </div>
                                <div class="my-auto">
                                    <h4 class="card-title mb-25">{{ $ticket->event->title }}</h4>
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
                                    <h6 class="mb-0">Sat, May 25, 2020</h6>
                                    <small>10:AM to 6:PM</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row meetings">
                                <div class="avatar bg-light-primary rounded me-1">
                                    <div class="avatar-content">
                                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <h6 class="mb-0">{{ $ticket->event->location_link }}</h6>
                                    <small class="text-capitalize">{{ $ticket->event->type }}</small>
                                </div>
                            </div>
                            <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                <a href="{{ route('user.certificate', $ticket->event->slug) }}"><button type="button" class="btn btn-primary">
                                    <i data-feather="award" class="me-25"></i>
                                    <span>E-Sertifikat</span>
                                </button></a>
                            </div>                            
                        </div>
                    </div>
                </div>
                <!--/ Developer Meetup Card -->
                @empty
                <h1>hehe</h1>
                @endforelse
            </div>

            <!--/ Card Advance -->

        </div>
    </div>
</div>
@endsection