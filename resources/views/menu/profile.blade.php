@extends('layouts.backend.main')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/page-profile.css') }}">
@endsection

@section('content')
    @if (session()->has('greet'))
        @php
            toast(session('greet'), 'success');
        @endphp
    @endif
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
                                            <img class="rounded img-fluid" @if (Auth::user()->picture == null)
                                            src="https://ui-avatars.com/api/?size=128&name={{ Auth::user()->name }}"
                                        @else
                                            src="{{ Auth::user()->picture }}"
                                            @endif />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white">{{ auth()->user()->name }}</h2>
                                            <p class="text-white">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav
                                        class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    {{-- <li class="nav-item">
                                                    <a class="nav-link fw-bold active" href="#">
                                                        <span class="d-none d-md-block">Feed</span>
                                                        <i data-feather="rss" class="d-block d-md-none"></i>
                                                    </a>
                                                </li> --}}
                                                </ul>
                                                <!-- edit button -->
                                                <a href="{{ route('user.profile.edit') }}"><button
                                                        class="btn btn-primary">
                                                        <i data-feather="edit" class="d-block d-md-none"></i>
                                                        <span class="fw-bold d-none d-md-block"><i data-feather="edit"></i>
                                                            Ubah Profil</span>
                                                    </button></a>
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
                            <div class="col-lg-8 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">Email:</h5>
                                        <p class="card-text">
                                            {{ auth()->user()->email }}
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Nomor HP:</h5>
                                            <p class="card-text">{{ auth()->user()->phone }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Tanggal Daftar:</h5>
                                            <p class="card-text">{{ auth()->user()->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->
                            </div>
                            <div class="col-lg-4 col-12 order-2 order-lg-1">
                                <!-- QR CODE -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">QR Code:</h5>
                                        <p class="card-text">
                                            <img src="https://v1.slashapi.com/solo/qr-code/7QtwLV8oHF?text={{ Auth::user()->email }}"
                                                width="160" height="160">
                                        </p>
                                    </div>
                                </div>
                                <!--/ QR CODE -->
                            </div>
                            <!--/ left profile info section -->



                        </div>

                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
        </div>
    </div>
@endsection
