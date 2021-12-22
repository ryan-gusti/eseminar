@extends('layouts.frontend.main')

@section('content')
    @extends('layouts.frontend.main')

@section('content')
    <!-- Blog  Area -->
    <div class="inner-service-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-8 col-lg-10 col-md-10">
                    <div class="section-heading-14 text-center">
                        <h3>Event Kategori {{ $category[0]->name }}</h3>
                        {{-- <h3>Semua Event</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Content Area -->
    <div class="blog-category-area blog-regular-area">
        <div class="container">
            <div class="row blog-regular-items">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-image">
                                <a href="{{ route('event', $slug = $event->slug) }}"><img class="w-100"
                                        style="border-radius: 30px;" src="{{ $event->banner }}" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <a href="{{ route('event', $slug = $event->slug) }}">
                                    <h4 class="mt-2">
                                        {{ $event->title }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-8 col-xs-10">
                    <div class="blog-reg-pagination-area">
                        <ul
                            class="
                    list-unstyled
                    pagination-list
                    d-flex
                    justify-content-center
                  ">
                            <li class="d-flex justify-content-center">
                                <a href="#" class="d-flex align-items-center"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a href="#" class="">1</a>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a href="#" class="">2</a>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a href="#" class="">3</a>
                            </li>
                            <li class="exerpt d-flex justify-content-center">
                                <a href="" class="">...</a>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a href="#" class="">9</a>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a href="#" class="d-flex align-items-center"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.promo-slider').slick({
                prevArrow: '<span class="priv_arrow"><i class="fas fa-angle-left"></i></span>',
                nextArrow: '<span class="next_arrow"><i class="fas fa-angle-right"></i></span>',
            });
        });
    </script>
@endsection

@endsection
