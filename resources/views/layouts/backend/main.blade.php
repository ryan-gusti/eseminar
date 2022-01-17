<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/page-profile.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    @yield('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand"
                        href="../../../html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                        y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                        x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path"
                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                style="fill:currentColor"></path>
                                            <path id="Path1"
                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                            </polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                            </polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                            </polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                        <h2 class="brand-text mb-0">ESeminar</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                            data-feather="search"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                            data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name fw-bolder">{{ auth()->user()->name }}</span><span
                                class="user-status">Admin</span></div><span class="avatar"><img
                                class="round"
                                src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a
                            class="dropdown-item" href="page-profile.html"><i class="me-50"
                                data-feather="user"></i> Profile</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item"
                            href="page-account-settings-account.html"><i class="me-50"
                                data-feather="settings"></i> Settings</a><a class="dropdown-item"
                            href="page-faq.html"><i class="me-50" data-feather="help-circle"></i> FAQ</a><a
                            class="dropdown-item" href="auth-login-cover.html"><i class="me-50"
                                data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('backend/app-assets/images/icons/xls.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small
                            class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('backend/app-assets/images/icons/jpg.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('backend/app-assets/images/icons/pdf.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('backend/app-assets/images/icons/doc.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI
                            designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75"
                        data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('components.navbar-back')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                    href="app-todo.html"><i class="me-1"
                                        data-feather="check-square"></i><span class="align-middle">Todo</span></a><a
                                    class="dropdown-item" href="app-chat.html"><i class="me-1"
                                        data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                    href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                    href="app-calendar.html"><i class="me-1"
                                        data-feather="calendar"></i><span class="align-middle">Calendar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <img class="card-img-top"
                                    src="{{ asset('backend/app-assets/images/profile/user-uploads/timeline.jpg') }}"
                                    alt="User Profile Image" />
                                <!--/ profile cover photo -->

                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-2.jpg') }}"
                                                class="rounded img-fluid" alt="Card image" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white">Kitty Allanson</h2>
                                            <p class="text-white">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav
                                        class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div
                                                class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold active" href="#">
                                                            <span class="d-none d-md-block">Feed</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">About</span>
                                                            <i data-feather="info" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Photos</span>
                                                            <i data-feather="image" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Friends</span>
                                                            <i data-feather="users" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- edit button -->
                                                <button class="btn btn-primary">
                                                    <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="fw-bold d-none d-md-block">Edit</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <!-- left profile info section -->
                            <div class="col-lg-3 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">About</h5>
                                        <p class="card-text">
                                            Tart I love sugar plum I love oat cake. Sweet ⭐️ roll caramels I love
                                            jujubes. Topping cake wafer.
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Joined:</h5>
                                            <p class="card-text">November 15, 2015</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Lives:</h5>
                                            <p class="card-text">New York, USA</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Email:</h5>
                                            <p class="card-text">bucketful@fiendhead.org</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-50">Website:</h5>
                                            <p class="card-text mb-0">www.pixinvent.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->

                                <!-- suggestion pages -->
                                <div class="card">
                                    <div class="card-body profile-suggestion">
                                        <h5 class="mb-2">Suggested Pages</h5>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/12-small.png') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Peter Reed</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ms-auto"><i data-feather="star"
                                                    class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/1-small.png') }}"
                                                    alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Harriett Adkins</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ms-auto"><i data-feather="star"
                                                    class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/10-small.png') }}"
                                                    alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Juan Weaver</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ms-auto"><i data-feather="star"
                                                    class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/3-small.png') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Claudia Chandler</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ms-auto"><i data-feather="star"
                                                    class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/5-small.png') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Earl Briggs</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ms-auto">
                                                <i data-feather="star" class="profile-favorite font-medium-3"></i>
                                            </div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/avatars/6-small.png') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Jonathan Lyons</h6>
                                                <small class="text-muted">Beauty Store</small>
                                            </div>
                                            <div class="profile-star ms-auto"><i data-feather="star"
                                                    class="font-medium-3"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ suggestion pages -->

                                <!-- twitter feed card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Twitter Feeds</h5>
                                        <!-- twitter feed -->
                                        <div class="profile-twitter-feed mt-1">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar me-1">
                                                    <img src="{{ asset('backend/app-assets/images/avatars/5-small.png') }}"
                                                        alt="avatar img" height="40" width="40" />
                                                </div>
                                                <div class="profile-user-info">
                                                    <h6 class="mb-0">Gertrude Stevens</h6>
                                                    <a href="#">
                                                        <small class="text-muted">@tiana59</small>
                                                        <i data-feather="check-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="profile-star ms-auto">
                                                    <i data-feather="star" class="font-medium-3"></i>
                                                </div>
                                            </div>
                                            <p class="card-text mb-50">I love cookie chupa chups sweet tart apple pie
                                                ⭐️ chocolate bar.</p>
                                            <a href="#">
                                                <small>#design #fasion</small>
                                            </a>
                                        </div>
                                        <!-- twitter feed -->
                                        <div class="profile-twitter-feed mt-2">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar me-1">
                                                    <img src="{{ asset('backend/app-assets/images/avatars/12-small.png') }}"
                                                        alt="avatar img" height="40" width="40" />
                                                </div>
                                                <div class="profile-user-info">
                                                    <h6 class="mb-0">Lura Jones</h6>
                                                    <a href="#">
                                                        <small class="text-muted">@tiana59</small>
                                                        <i data-feather="check-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="profile-star ms-auto">
                                                    <i data-feather="star" class="font-medium-3 profile-favorite"></i>
                                                </div>
                                            </div>
                                            <p class="card-text mb-50">Halvah I love powder jelly I love cheesecake
                                                cotton candy. 😍</p>
                                            <a href="#">
                                                <small>#vuejs #code #coffeez</small>
                                            </a>
                                        </div>
                                        <!-- twitter feed -->
                                        <div class="profile-twitter-feed mt-2">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar me-1">
                                                    <img src="{{ asset('backend/app-assets/images/avatars/1-small.png') }}"
                                                        alt="avatar img" height="40" width="40" />
                                                </div>
                                                <div class="profile-user-info">
                                                    <h6 class="mb-0">Norman Gross</h6>
                                                    <a href="#">
                                                        <small class="text-muted">@tiana59</small>
                                                        <i data-feather="check-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="profile-star ms-auto">
                                                    <i data-feather="star" class="font-medium-3"></i>
                                                </div>
                                            </div>
                                            <p class="card-text mb-50">Candy jelly beans powder brownie biscuit. Jelly
                                                marzipan oat cake cake.</p>
                                            <a href="#">
                                                <small>#sketch #uiux #figma</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ twitter feed card -->
                            </div>
                            <!--/ left profile info section -->

                            <!-- center profile info section -->
                            <div class="col-lg-6 col-12 order-1 order-lg-2">
                                <!-- post 1 -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <!-- avatar -->
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-18.jpg') }}"
                                                    alt="avatar img" height="50" width="50" />
                                            </div>
                                            <!--/ avatar -->
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Leeanna Alvord</h6>
                                                <small class="text-muted">12 Dec 2018 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the
                                            perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img class="img-fluid rounded mb-75"
                                            src="{{ asset('backend/app-assets/images/profile/post-media/2.jpg') }}"
                                            alt="avatar img" />
                                        <!--/ post img -->

                                        <!-- like share -->
                                        <div
                                            class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="#" class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                        class="profile-likes font-medium-3 me-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ms-1">
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Trina Lynes"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Lilian Nenez"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-2.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Alberto Glotzbach"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="George Nordic"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-5.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Vinnie Mostowy"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-4.jpg') }}"
                                                                alt=" Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-muted text-nowrap ms-50">+140 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                        class="text-body font-medium-3 me-50"></i>
                                                    <span class="text-muted me-1">1.25k</span>
                                                </a>

                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                        class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comments -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-6.jpg') }}"
                                                    alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users
                                                    to search quickly.</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                                    alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Jackey Potter</h6>
                                                    <a href="#">
                                                        <i data-feather="heart"
                                                            class="profile-likes font-medium-3"></i>
                                                        <span class="align-middle text-muted">61</span>
                                                    </a>
                                                </div>
                                                <small>
                                                    Unlimited color🖌 options allows you to set your application color
                                                    as per your branding 🤪.
                                                </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment box -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea" rows="3"
                                                placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!--/ comment box -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 1 -->

                                <!-- post 2 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image and title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-22.jpg') }}"
                                                    alt="avatar img" height="50" width="50" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Rosa Walters</h6>
                                                <small class="text-muted">11 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image and title -->
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the
                                            perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img class="img-fluid rounded mb-75"
                                            src="{{ asset('backend/app-assets/images/profile/post-media/25.jpg') }}"
                                            alt="avatar img" />
                                        <!--/ post img -->

                                        <!-- like share -->
                                        <div
                                            class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="#" class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                        class="profile-likes font-medium-3 me-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ms-1">
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Trina Lynes"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Lilian Nenez"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-2.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Alberto Glotzbach"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="George Nordic"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-5.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Vinnie Mostowy"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-4.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-muted text-nowrap ms-50">+271 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                        class="text-body font-medium-3 me-50"></i>
                                                    <span class="text-muted me-1">1.25k</span>
                                                </a>

                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                        class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comments -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-50">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg') }}"
                                                    alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users
                                                    to search quickly. </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment text area -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea2">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea2" rows="3"
                                                placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!--/ comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 2 -->

                                <!-- post 3 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-15.jpg') }}"
                                                    alt="avatar img" height="50" width="50" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Charles Watson</h6>
                                                <small class="text-muted">12 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image title -->

                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the
                                            perfect fit.
                                        </p>

                                        <!-- video -->
                                        <iframe src="https://www.youtube.com/embed/6stlCkUDG_s"
                                            class="w-100 rounded border-0 height-250 mb-50"></iframe>
                                        <!--/ video -->

                                        <!-- like share -->
                                        <div
                                            class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="#" class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                        class="profile-likes font-medium-3 me-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ms-1">
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Vinnie Mostowy"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-5.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Elicia Rieske"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Julee Rossignol"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-10.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Darcey Nooner"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Elicia Rieske"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-muted text-nowrap ms-50">+264 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div
                                                class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                        class="text-body font-medium-3 me-50"></i>
                                                    <span class="text-muted me-1">1.25k</span>
                                                </a>

                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                        class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comment -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-50">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-3.jpg') }}"
                                                    alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-content-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users
                                                    to search quickly.</small>
                                            </div>
                                        </div>
                                        <!-- comment -->

                                        <!-- comment text area -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea3">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea3" rows="3"
                                                placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!-- comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 3 -->
                            </div>
                            <!--/ center profile info section -->

                            <!-- right profile info section -->
                            <div class="col-lg-3 col-12 order-3">
                                <!-- latest profile pictures -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-0">Latest Photos</h5>
                                        <div class="row">
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-13.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-02.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-03.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-04.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-05.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-06.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-07.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-08.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="{{ asset('backend/app-assets/images/profile/user-uploads/user-09.jpg') }}"
                                                        class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ latest profile pictures -->

                                <!-- suggestion -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Suggestions</h5>
                                        <div class="d-flex justify-content-start align-items-center mt-2">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-9.jpg') }}"
                                                    alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Peter Reed</h6>
                                                <small class="text-muted">6 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-icon btn-sm ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-6.jpg') }}"
                                                    alt="avtar img holder" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Harriett Adkins</h6>
                                                <small class="text-muted">3 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm btn-icon ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-7.jpg') }}"
                                                    alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Juan Weaver</h6>
                                                <small class="text-muted">1 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary btn-icon ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Claudia Chandler</h6>
                                                <small class="text-muted">16 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary btn-icon ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Earl Briggs</h6>
                                                <small class="text-muted">4 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary btn-icon ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                            <div class="avatar me-75">
                                                <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-10.jpg') }}"
                                                    alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Jonathan Lyons</h6>
                                                <small class="text-muted">25 Mutual Friends</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary btn-icon ms-auto">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ suggestion -->

                                <!-- polls card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-1">Polls</h5>
                                        <p class="card-text mb-0">Who is the best actor in Marvel Cinematic Universe?
                                        </p>

                                        <!-- polls -->
                                        <div class="profile-polls-info mt-2">
                                            <!-- custom radio -->
                                            <div class="d-flex justify-content-between">
                                                <div class="form-check">
                                                    <input type="radio" id="bestActorPoll1" name="bestActorPoll"
                                                        class="form-check-input" />
                                                    <label class="form-check-label" for="bestActorPoll1">RDJ</label>
                                                </div>
                                                <div class="text-end">82%</div>
                                            </div>
                                            <!--/ custom radio -->

                                            <!-- progressbar -->
                                            <div class="progress progress-bar-primary my-50">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="58"
                                                    aria-valuemin="58" aria-valuemax="100" "
                ></div>
              </div>
              <!--/ progressbar -->

              <!-- avatar group with tooltip -->
              <div class="                                                                                                                    avatar-group my-1">
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="bottom" title="Tonia Seabold"
                                                        class="avatar pull-up">
                                                        <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-12.jpg') }}"
                                                            alt="Avatar" height="26" width="26" />
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="bottom" title="Carissa Dolle"
                                                        class="avatar pull-up">
                                                        <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-5.jpg') }}"
                                                            alt="Avatar" height="26" width="26" />
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="bottom" title="Kelle Herrick"
                                                        class="avatar pull-up">
                                                        <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-9.jpg') }}"
                                                            alt="Avatar" height="26" width="26" />
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="bottom" title="Len Bregantini"
                                                        class="avatar pull-up">
                                                        <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-10.jpg') }}"
                                                            alt="Avatar" height="26" width="26" />
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="bottom" title="John Doe"
                                                        class="avatar pull-up">
                                                        <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                                            alt="Avatar" height="26" width="26" />
                                                    </div>
                                                </div>
                                                <!--/ avatar group with tooltip -->
                                            </div>

                                            <div class="profile-polls-info mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <!-- custom radio -->
                                                    <div class="form-check">
                                                        <input type="radio" id="bestActorPoll2" name="bestActorPoll"
                                                            class="form-check-input" />
                                                        <label class="form-check-label" for="bestActorPoll2">Chris
                                                            Hemswort</label>
                                                    </div>
                                                    <!--/ custom radio -->
                                                    <div class="text-end">67%</div>
                                                </div>
                                                <!-- progressbar -->
                                                <div class="progress progress-bar-primary my-50">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="16"
                                                        aria-valuemin="16" aria-valuemax="100" "
                ></div>
              </div>
              <!--/ progressbar -->

              <!-- avatar group with tooltips -->
              <div class="                                                                                                                    avatar-group mt-1">
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Liliana Pecor"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-9.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Kasandra NaleVanko"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Jonathan Lyons"
                                                            class="avatar pull-up">
                                                            <img src="{{ asset('backend/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                                                alt="Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <!--/ avatar group with tooltips-->
                                                </div>
                                                <!--/ polls -->
                                            </div>
                                        </div>
                                        <!--/ polls card -->
                                    </div>
                                    <!--/ right profile info section -->
                                </div>

                                <!-- reload button -->
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="button"
                                            class="btn btn-sm btn-primary block-element border-0 mb-1">Load
                                            More</button>
                                    </div>
                                </div>
                                <!--/ reload button -->
                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
                    class="ms-25" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights
                    Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i
                    data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/pages/page-profile.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
