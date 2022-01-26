@extends('layouts.frontend.main')

@section('content')
    <div class="portfolio-details-content-area-2" style="margin-top: 50px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="content">
                        <h3>{{ $event->title }}</h3>
                        <center>
                            <img src="{{ $event->banner }}" alt="" class="img-fluid" width="500" id="banner"
                                data-zoom-image="/image/portfolio/20211214091253.jpg" />
                        </center>
                        <hr />
                        <h4>Deskripsi Event</h4>
                        {!! $desc !!}
                        <hr />
                        <h4>Kontak Panitia</h4>
                        <span>{{ $event->user->name }}</span>
                        <span>{{ $event->user->phone }}</span>
                        <span>{{ $event->user->email }}</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-9 mb-4">
                    <div class="project-info-area-pr-de-2" style="margin-top: 50px">
                        <div class="port-details-1-content">
                            <h4>
                                <i class="fas fa-info-circle me-2"></i> Informasi Event
                            </h4>
                            <div class="project-details">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-users me-2"></i><strong>Kouta:</strong>
                                        <span>{{ $event->quota }} Peserta</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar-alt me-2"></i><strong>Tanggal Mulai:</strong>
                                        <span>17 December 2021 13:00</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-pin me-2"></i><strong>Lokasi:</strong>
                                        <span>
                                            @if ($event->location == null)
                                                Online
                                            @else
                                                {{ $event->location }}
                                            @endif
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-filter"></i>
                                        <strong>Category:</strong>
                                        <span>
                                            @foreach ($event->categories as $category)
                                                {{ $category->name }},
                                            @endforeach
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-money-bill me-2"></i><strong>Harga:</strong>
                                        <span>Rp {{ $event->price }}</span>
                                    </li>
                                </ul>
                                <a href="#" class="btn"><i class="fas fa-ticket-alt me-2"></i> Beli Tiket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
