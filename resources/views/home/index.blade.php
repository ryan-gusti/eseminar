@extends('layouts.frontend.main')

@section('content')
    <!-- Hero Area -->
    <div class="hero-area-l-12 position-relative z-index-1 overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12 order-lg-1 order-1" data-aos="fade-right"
                    data-aos-duration="800" data-aos-once="true">
                    <div class="content">
                        <h1>Selamat Datang di ESeminar</h1>
                        <p>
                            Create custom landing pages with Shades that convert more
                            visitors than any website—no coding required.
                        </p>
                        <a href="#" class="btn focus-reset">Get Started</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-8 order-lg-1 order-0" data-aos="fade-left" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="hero-video-l12 position-relative text-center">
                        <img src="{{ asset('frontend/image/l6/l6-hero-img.png') }}" alt="" class="w-100" />
                        <a data-fancybox="" href="https://www.youtube.com/watch?v=9yc1lfFZX-I">
                            <div class="d-inline-block video-icon d-inline-block">
                                <i class="fas fa-play align-center"></i>
                            </div>
                        </a>
                        <div class="video-area-shape-l-12">
                            <img src="{{ asset('frontend/image/l6/shape-2.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-shape-l12-1 d-none d-sm-block">
            <img src="{{ asset('frontend/image/l6/shape-1.png') }}" alt="" />
        </div>
        <div class="hero-shape-l12-2 d-none d-sm-block">
            <img src="{{ asset('frontend/image/l6/shape-3.png') }}" alt="" />
        </div>
    </div>
    <!-- Counter-area -->
    <div class="counter-area-l12 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Statistik ESeminar</h2>
                </div>
            </div>
            <div class="row counter-area-l12-items z-index-5 position-relative">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-sm-6" data-aos="fade-right" data-aos-duration="800"
                    data-aos-once="true">
                    <div
                        class="
                  counter-single-wrapper-l-12
                  d-flex
                  justify-content-center
                  text-center
                  bg-white
                  position-relative
                  overflow-hidden
                  z-index-1
                ">
                        <div class="d-block">
                            <h5><span class="counter">12,382</span></h5>
                            <p>Total Pengguna</p>
                        </div>
                        <div class="counter_bg-img">
                            <img src="{{ asset('frontend/image/l6/l6-counter-img1.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-sm-6" data-aos="fade-right" data-aos-duration="1200"
                    data-aos-once="true">
                    <div
                        class="
                  counter-single-wrapper-l-12
                  d-flex
                  justify-content-center
                  text-center
                  bg-white
                  position-relative
                  overflow-hidden
                  z-index-1
                ">
                        <div class="d-block">
                            <h5><span class="counter">103</span></h5>
                            <p>Event</p>
                        </div>
                        <div class="counter_bg-img">
                            <img src="{{ asset('frontend/image/l6/l6-counter-img2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-sm-6" data-aos="fade-right" data-aos-duration="1600"
                    data-aos-once="true">
                    <div
                        class="
                  counter-single-wrapper-l-12
                  d-flex
                  justify-content-center
                  text-center
                  bg-white
                  position-relative
                  overflow-hidden
                  z-index-1
                ">
                        <div class="d-block">
                            <h5><span class="counter">3,493</span></h5>
                            <p>5 Star Reviews</p>
                        </div>
                        <div class="counter_bg-img">
                            <img src="{{ asset('frontend/image/l6/l6-counter-img3.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-sm-6" data-aos="fade-right" data-aos-duration="2000"
                    data-aos-once="true">
                    <div
                        class="
                  counter-single-wrapper-l-12
                  d-flex
                  justify-content-center
                  text-center
                  bg-white
                  position-relative
                  overflow-hidden
                  z-index-1
                ">
                        <div class="d-block">
                            <h5><span class="counter">21</span>k</h5>
                            <p>Tiket Terjual</p>
                        </div>
                        <div class="counter_bg-img">
                            <img src="{{ asset('frontend/image/l6/l6-counter-img4.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Area -->
    <div class="testimonial-area-l-12 mt-4">
        <div class="container position-relative">
            <div class="testimonial-area-l12-shape">
                <img src="{{ asset('frontend/image/l6/shape-7.svg') }}" alt="" class="w-100" />
            </div>
            <div class="row">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12">
                    <div class="section-heading-6">
                        <h2>Kategori Events</h2>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-4 col-lg-3 col-md-12">
                    <div class="l-12-slider-arrow-1 text-end">
                        <i class="prev9 icon icon-tail-left slick-arrow"></i>
                        <i class="next9 icon icon-tail-right slick-arrow slick-active"></i>
                    </div>
                </div>
            </div>
            <div class="row testimonial-items-l-12">
                <div class="col-12">
                    <div class="testimonial-slider-l-12">
                        @foreach ($categories as $category)
                            <div class="single-item focus-reset" data-aos="fade-up" data-aos-duration="800"
                                data-aos-once="true">
                                <div class="card--testimonial-l-12">
                                    <div class="testimonial-l-12-image">
                                        <img class="w-100"
                                            src="{{ asset('frontend/image/category/' . $category->image) }}"
                                            alt="image" />
                                    </div>
                                    <div class="testimonial-l-12-content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="lecturer-identity">
                                                <h6>{{ $category->name }}</h6>
                                            </div>
                                            <div class="video-area">
                                                <a href="{{ route('event_category', $slug = $category->slug) }}"
                                                    class="focus-reset">
                                                    <div class="d-inline-block video-icon d-inline-block">
                                                        <i class="fas fa-eye align-center"></i>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Area -->
    <div class="faq-area-l-12 position-relative">
        <div class="faq-l-12-shape">
            <img src="{{ asset('frontend/image/l6/shape-8.svg') }}" alt="" class="w-100" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7">
                    <div class="section-heading-6 text-center">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="faq-l-12-1">
                                <ul class="accordion p-0">
                                    <li class="active">
                                        <a>Will I get full access to the course after
                                            purchasing?</a>
                                        <p>
                                            A client once said we’re the best of both worlds. A
                                            creative powerhouse with boutique service. That’s
                                            because we stay small and deliver big. Our directors
                                            are hands-on. Always thinking. Always creating. And
                                            always putting their experience into practice on every
                                            project.
                                        </p>
                                    </li>
                                    <li>
                                        <a>Do you give money back guarantee?</a>
                                        <p>
                                            Completely synergize resource taxing relationships via
                                            premier niche markets. Professionally cultivate
                                            one-to-one customer service with robust ideas.
                                            Dynamically innovate resource-leveling customer
                                            service for state of the art customer service.
                                        </p>
                                    </li>
                                    <li>
                                        <a>How can I submit my questions after joining?</a>
                                        <p>
                                            Completely synergize resource taxing relationships via
                                            premier niche markets. Professionally cultivate
                                            one-to-one customer service with robust ideas.
                                            Dynamically innovate resource-leveling customer
                                            service for state of the art customer service.
                                        </p>
                                    </li>
                                    <li>
                                        <a>Do you offer a discount?</a>
                                        <p>
                                            Completely synergize resource taxing relationships via
                                            premier niche markets. Professionally cultivate
                                            one-to-one customer service with robust ideas.
                                            Dynamically innovate resource-leveling customer
                                            service for state of the art customer service.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter-area start -->
    <div class="newsletter-area-l-12 position-relative overflow-hidden">
        <div class="news-letter-l-12-shape d-none d-md-block">
            <img src="{{ asset('frontend/image/l6/shape-9.png') }}" alt="" class="w-100 mt-n10" />
        </div>
        <div class="container" data-aos="fade-down" data-aos-duration="800" data-aos-once="true">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="text-center">
                        <span>Time to take action</span>
                        <h2>Ready to learn UX Design from the expert?</h2>
                    </div>
                    <div class="btn-area d-flex justify-content-center">
                        <a href="#" class="btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
