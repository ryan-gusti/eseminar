<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>
    <!-- <body data-layout="horizontal"> -->
    @yield('content')

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('/libs/pace-js/pace.min.js') }}"></script>
    <!-- password addon init -->
    <script src="{{ asset('/js/pages/pass-addon.init.js') }}"></script>
    @yield('js')

</body>

</html>
