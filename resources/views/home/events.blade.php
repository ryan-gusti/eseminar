@extends('layouts.backend.main')

@section('title', 'List Event Tersedia')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <section id="hero-header">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <div class="card card-congratulations py-2">
                            <div class="card-body text-center">
                                <img src="{{ asset('backend/app-assets/images/elements/decore-left.png') }}"
                                    class="congratulations-img-left" alt="card-img-left">
                                <img src="{{ asset('backend/app-assets/images/elements/decore-right.png') }}"
                                    class="congratulations-img-right" alt="card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="book-open"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Ikuti event yang kamu sukai!</h1>
                                    <p class="card-text m-auto w-75">
                                        Kamu bisa mengikuti lebih dari <strong>{{ $events->count() }}</strong> event yang telah kami sediakan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="list-event">
                            @forelse ($events as $event)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <div class="card h-100">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/banner-event/'. $event->banner) }}" height="350"
                                            alt="Card image cap">
                                        <div class="card-body pb-0 text-center">
                                            <h3 class="card-title" style="height: 50px;">{{ $event->title }}</h3>
                                            <div class="mb-0">
                                            <button
                                                class="btn btn-outline-success">{{ date('d F Y', strtotime($event->time)) }}</button>
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('event', $slug = $event->slug) }}">Detail
                                                Event</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="misc-inner p-2 p-sm-3 mt-0">
                                    <div class="w-100 text-center">
                                        <h2>Event yang kamu cari ga ditemukan nih! 🕵🏻‍♀️</h2>
                                        <img src="{{ asset('storage/not-found.png') }}" class="img-fluid"><br>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
            <div class="content-body">
                <section class="faq-contact mb-5">
                    <div class="row mt-5 pt-5 border-top">
                        <div class="col-12 text-center">
                            <h2>Punya pertanyaan?</h2>
                            <p class="mb-3">
                                Jika memiliki pertanyaan, kamu bisa menghubungi kami melalui kontak di bawah.
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="accordion-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-phone-call font-medium-3">
                                            <path
                                                d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h4>+ (628) 3848 2568</h4>
                                    <span class="text-body">dengan senang membantu kamu</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="accordion-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-mail font-medium-3">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                    <h4>hello@esminarq.com</h4>
                                    <span class="text-body">cara terbaik untuk bertanya!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
