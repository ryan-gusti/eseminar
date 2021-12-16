<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Course</title>
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
    <!-- Bootstrap , fonts & icons  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icon-font/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/typography-font/typo.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/fontawesome-5/css/all.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- Plugin'stylesheets  -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fancybox/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/nice-select/nice-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.min.css') }}" />
    <!-- Vendor stylesheets  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <!-- Custom stylesheet -->
    @yield('css')
</head>

<body data-theme-mode-panel-active data-theme="light" style="font-family: 'Mazzard H'">
    <div class="site-wrapper overflow-hidden position-relative">
        <!--Site Navbar Area -->
        @include('components.navbar-front')
        <!-- end-navbar -->
        @yield('content')
        <!-- Footer Area -->
        @include('components.footer-front')
        <!-- end-footer -->
    </div>
    <!-- Vendor Scripts -->
    <script src="{{ asset('frontend/js/vendor.min.js') }}"></script>
    <!-- Plugin's Scripts -->
    <script src="{{ asset('frontend/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/aos/aos.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
    <script src="https://porjoton.netlify.app/mekanic/js/waypoints.min.js"></script>
    <script src="{{ asset('frontend/plugins/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/isotope/packery.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/isotope/image.loaded.js') }}"></script>
    <script src="{{ asset('frontend/plugins/menu/menu.js') }}"></script>
    <!-- Activation Script -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>
