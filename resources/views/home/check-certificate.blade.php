@extends('layouts.backend.main')

@section('title', 'Cek Sertifikat!')

@section('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/slick/slick.min.css') }}">
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
                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Detail Sertifikat</h4>
                                    <div class="d-flex">
                                        <div class="avatar me-50">
                                            @if ($data->user->picture)
                                                <img class="rounded img-fluid" alt="Avatar" width="60" height="60"
                                                    src="{{ asset('storage/user-image/' . $data->user->picture) }}">
                                            @else
                                                <img class="rounded img-fluid" alt="Avatar" width="50" height="50"
                                                    src="{{ asset('storage/user-image/avatar.png') }}">
                                            @endif
                                            </div>
                                        <div class="author-info mt-1">
                                            <label class="text-muted me-25">Dimiliki oleh</label>
                                            <label><a href="#" class="text-body">{{ $data->user->name }}</a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @php
                    alert()->success('Valid!','Sertifikat Valid!');
                @endphp
                <img class="img-fluid rounded" src="data:image/png;base64, {!! base64_encode($certificate) !!} ">
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
    <!-- slickjs -->
    <script src="{{ asset('backend/app-assets/vendors/slick/slick.min.js') }}"></script>
    <!-- end slickjs -->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        $('.slick').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            swipe: true,
            infinite: true,
            autoplaySpeed: 4000,
            appendArrows: ".slider-arrow-section",
            nextArrow: ".slick-next",
            prevArrow: ".slick-prev",
            pauseOnHover: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ]
        });

        Fancybox.bind('[data-fancybox="banner-preview"]', {
        groupAttr: false,
        });
    </script>
@endsection
