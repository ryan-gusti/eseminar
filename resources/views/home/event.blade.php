@extends('layouts.backend.main')

@section('title', $event->title)

@section('css')
    <style>
        .text-head {
            font-size: 56px;
            font-weight: 900;
            line-height: 5.5rem;
            letter-spacing: -4px;
        }

        /* the slides */
        .slick-slide {
            margin: 0 20px;
        }

        /* the parent */
        .slick-list {
            margin: 0 -20px;
        }

        .img-non-fluid {
            max-height: 300px;
        }

    </style>
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <section class="event-detail mb-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-1">
                                <img src="{{ asset('storage/' . $event->banner) }}" class="mx-auto d-block img-non-fluid"
                                    id="myimage" alt="Blog Detail Pic">
                                <div class="card-header border-top text-center">
                                    <h4 class="card-title">
                                        <span class="fw-bold">{{ $event->title }}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i data-feather='file-text'></i> Detail event</h4>
                                    <div class="d-flex">
                                        <div class="avatar me-50">
                                            @if ($event->user->picture)
                                                <img class="round" src="{{ asset('storage/user-image/' . $event->user->picture) }}" alt="partner" height="45" width="45">
                                            @else
                                                <img src="{{ asset('storage/user-image/avatar.png') }}" alt="Avatar"
                                                    width="45" height="45">
                                            @endif
                                        </div>
                                        <div class="author-info mt-1">
                                            <small class="text-muted me-25">Dibuat oleh</small>
                                            <small><a href="#" class="text-body">{{ $event->user->name }}</a></small>
                                            <span class="text-muted ms-50 me-25">|</span>
                                            <small class="text-muted text-capitalize">{{ $event->user->role }}</small>
                                        </div>
                                    </div>
                                    <div class="my-1 py-25">
                                        @foreach ($event->categories as $category)
                                            <a href="{{ route('event_category', $slug = $category->slug) }}">
                                                <span
                                                    class="badge rounded-pill badge-light-primary me-50">{{ $category->title }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <p class="card-text">
                                        {!! $desc !!}
                                    </p>
                                    <hr class="my-2">
                                    <div class="d-inline">
                                        <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                            target="_blank"><span class="badge bg-primary mr-2">
                                                <i data-feather='facebook'></i>
                                                <span>Share</span>
                                            </span></a>
                                        <a href="http://twitter.com/share?url={{ url()->current() }}&text={{ $event->title }}&hashtags=eseminar"
                                            target="_blank"><span class="badge bg-info mr-2">
                                                <i data-feather='twitter'></i>
                                                <span>Tweet</span>
                                            </span></a>
                                        <a href="#" class="copyResult" id="copyResult"><span
                                                class="badge bg-secondary mr-2">
                                                <i data-feather='link'></i>
                                                <span>Copy Link</span>
                                            </span></a>
                                        <input type="hidden" value="{{ url()->current() }}" class="copyUrl"
                                            id="copyUrl">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-1">
                                <div class="card-header d-flex justify-content-center">
                                    <div class="fs-2">
                                        <h4><i data-feather='info'></i> Informasi event</h4>
                                    </div>
                                </div>
                                <div class="card-body fs-5">
                                    <ul class="list-group text-capitalize mb-2">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="me-2">Kuota:</strong> {{ $event->quota }} Peserta
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="me-2">Waktu Mulai:</strong>
                                            {{ date('d F Y H:m', strtotime($event->time)) }}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="me-2">Tipe:</strong> {{ $event->type }}
                                        </li>
                                        @if ($event->price == 0)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="me-2">Harga:</strong> GRATIS
                                            </li>
                                        @else
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="me-2">Harga:</strong>Rp
                                                {{ number_format($event->price) }}
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="d-grid">
                                    {{-- cek apakah user sudah log in --}}
                                        @if (Auth::check())
                                        {{-- cek apakah status event closed --}}
                                            @if ($event->status == 'close')
                                            <a href="#"
                                                class="btn btn-block btn-danger py-1">
                                                <i data-feather="lock"></i>
                                                Event telah Ditutup</a>
                                            @else
                                            <a href={{ route('checkout.create', $event->slug) }}
                                                class="btn btn-block btn-primary py-1">
                                                <i data-feather="send"></i>
                                                Pesan Tiket</a>
                                            @endif
                                        @elseif ($event->status == 'close')
                                            <a href="#"
                                                class="btn btn-block btn-danger py-1">
                                                <i data-feather="lock"></i>
                                                Event telah Ditutup</a>
                                        @else
                                            <a href={{ route('login') }} class="btn btn-block btn-primary py-1">
                                                <i data-feather="log-in"></i>
                                                Masuk untuk Pesan Tiket</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top: -10px;">
                                <div class="card-body">
                                    <h4><i data-feather='phone'></i> Kontak Person</h4>
                                    <hr class="my-2">
                                    <div class="card-text">
                                        <h5>{{ $event->user->name }}</h5>
                                        <h6>{{ $event->user->phone }}</h6>
                                        <h6>{{ $event->user->email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
    <script type="text/javascript">
        $("#copyResult").click(function() {
            if (confirm("Copy to clipboard")) {
                copyText('#copyUrl');
                alert('berhasil!');
            }
        });

        function copyText(element) {
            var $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection
