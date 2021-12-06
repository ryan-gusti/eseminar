@extends('layouts.main')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/belajar.css') }}" />
@endsection

@section('content')
    <div class="promo-slider">
        <div class="promo-img">
            <a href="#"><img src="https://www.ngampooz.com/materialize/img/banner_lfh.jpg" class="img-fluid"></a>
        </div>
        <div class="promo-img">
            <a href="#"><img src="https://www.ngampooz.com/materialize/img/banner_new1.png" class="img-fluid"></a>
        </div>
        <div class="promo-img">
            <a href="#"><img src="https://www.ngampooz.com/materialize/img/banner_new2.png" class="img-fluid"></a>
        </div>
        <div class="promo-img">
            <a href="#"><img src="https://www.ngampooz.com/materialize/img/banner_new3.png" class="img-fluid"></a>
        </div>
    </div>
    <div>
        <h3 class="text-center mt-2">Kategory Event</h3>
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
