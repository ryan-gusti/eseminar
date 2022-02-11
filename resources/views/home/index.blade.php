@extends('layouts.backend.main')

@section('title', 'Selamat Datang!')

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
            <section id="hero-header" class="mb-5">
                <div class="row flex-row-reverse mt-2">
                    <div class="col-md-6 col-sm-12">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('backend/app-assets/images/slider/06.jpg') }}"
                                        class="img-fluid d-block w-100" alt="cf-img-1" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('backend/app-assets/images/slider/02.jpg') }}"
                                        class="img-fluid d-block w-100" alt="cf-img-2" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('backend/app-assets/images/slider/05.jpg') }}"
                                        class="img-fluid d-block w-100" alt="cf-img-3" />
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 justify-content-center">
                        <p class="text-head pt-3 align-middle text-dark">Selamat Datang<br> di ESeminar</p>
                        <p>
                        <p class="h3 mt-2 mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem sint maiores amet omnis
                            praesentium deleniti?
                        </p>
                        <a href="#" class="btn btn-primary btn-lg btn-block p-2 px-3">Get Started</a>
                        </p>
                    </div>
                </div>
            </section>
            <div class="content-body">
                <div class="row">
                    <div class="col-12 mb-5 mt-5 border-top">
                        <div class="row">
                            <div class="text-center my-4">
                                <p class="h1 text-capitalize">Statistik ESeminar</p>
                                <p class="mb-1">
                                    Berikut pencapaian kami selama membuka event.
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center">
                                        <div class="avatar bg-light-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h1 class="display-6 fw-bolder mt-1">{{ $totalUsers }}</h1>
                                        <p class="h4 card-text">Total Pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center">
                                        <div class="avatar bg-light-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h1 class="display-6 fw-bolder mt-1">{{ $totalEvents }}</h1>
                                        <p class="h4 card-text">Total Event</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center">
                                        <div class="avatar bg-light-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i data-feather="trello" class="font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h1 class="display-6 fw-bolder mt-1">{{ $totalTransactions }}</h1>
                                        <p class="h4 card-text">Tiket Terjual</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Kategori Event -->
                        <div class="d-flex justify-content-between my-3 ">
                            <h1 class="h1 fw-bolder">Kategori Event</h1>
                            <div class="slider-arrow-section text-end align-items-center">
                                <button class="slick-prev slick-arrow slick-active btn btn-primary"><i
                                        data-feather="arrow-left"></i></button>
                                <button class="slick-next slick-arrow btn btn-primary"><i
                                        data-feather="arrow-right"></i></button>
                            </div>
                        </div>
                        <div class="slider slick">
                            @foreach ($categories as $category)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/category-image/' . $category->image) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title fw-bolder text-center">{{ $category->title }}</h4>
                                            <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                                                <a href="{{ route('event_category', $slug = $category->slug) }}"
                                                    class="btn btn-outline-primary waves-effect"><i data-feather='eye'></i>
                                                    Lihat Kategori</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
    </script>
@endsection
