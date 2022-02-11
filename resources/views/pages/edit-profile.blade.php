@extends('layouts.backend.main')

@section('title', 'Ubah Profil')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Akun</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Akun</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.password.edit') }}">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Keamanan</span>
                                </a>
                            </li>
                        </ul>

                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Detail Profil</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                @if (session()->has('message'))
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-body d-flex align-items-center">
                                            <i data-feather="check-circle" class="me-50"></i>
                                            <span>{{ session('message') }}</span>
                                        </div>
                                    </div>
                                @endif


                                <!-- form -->
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    class="validate-form pt-50" enctype="multipart/form-data">
                                    @method("PUT")
                                    @csrf
                                <!-- header section -->
                                <div class="d-flex">
                                    <a href="#" class="me-25">
                                        @if (Auth::user()->picture)
                                            <img src="{{ asset('storage/user-image/' . Auth::user()->picture) }}"
                                                id="account-upload-img" class="uploadedAvatar rounded me-50"
                                                alt="profile image" height="100" width="100" />
                                        @else
                                            <img src="{{ asset('storage/user-image/avatar.png') }}"
                                                id="account-upload-img" class="uploadedAvatar rounded me-50"
                                                alt="profile image" height="100" width="100" />
                                        @endif

                                    </a>
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Pilih
                                                Foto</label>
                                            <input type="file" name="picture" id="account-upload" hidden accept="image/*" />
                                            {{-- <button type="button" id="account-reset"
                                                class="btn btn-sm btn-outline-secondary mb-75">Reset</button> --}}
                                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <!--/ header section -->
                                    <div class="row mt-2">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', auth()->user()->name) }}"
                                                data-msg="Please enter first name" />
                                            @error('name')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="phone">Nomor HP</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="08xxxxx" value="{{ old('phone', auth()->user()->phone) }}"
                                                data-msg="Please enter last name" />
                                            @error('phone')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Simpan
                                                Perubahan</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
