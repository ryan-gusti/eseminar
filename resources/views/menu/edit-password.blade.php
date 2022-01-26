@extends('layouts.backend.main')

@section('title', 'Ubah Password')

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
                            <a class="nav-link" href="{{ route('user.profile.edit') }}">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Akun</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Keamanan</span>
                            </a>
                        </li>
                    </ul>

                    <!-- security -->

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                        <div class="card-body pt-1">
                            @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                  <i data-feather="check-circle" class="me-50"></i>
                                  <span>{{session('message')}}</span>
                                </div>
                              </div>
                            @endif
                            <!-- form -->
                            <form action="{{ route('user.password.update') }}" method="POST" class="validate-form">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-old-password">Password Sekarang</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control" id="account-old-password" name="current_password" placeholder="Input password sekarang" data-msg="Please current password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        @error('current_password')
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                            <i data-feather="info" class="me-50"></i>
                                            <span>{{ $message }}</span>
                                            </div>
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-new-password">Password Baru</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-new-password" name="password" class="form-control" placeholder="Input password baru" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                <div class="alert-body d-flex align-items-center">
                                                <i data-feather="info" class="me-50"></i>
                                                <span>{{ $message }}</span>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-retype-new-password">Konfirmasi Password Baru</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control" id="account-retype-new-password" name="password_confirmation" placeholder="Konfirmasi password baru" />
                                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                <div class="alert-body d-flex align-items-center">
                                                <i data-feather="info" class="me-50"></i>
                                                <span>{{ $message }}</span>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <p class="fw-bolder">Ketentuan Password:</p>
                                        <ul class="ps-1 ms-25">
                                            <li class="mb-50">Minimum panjang password 8 karakter</li>
                                            <li>Terdapat simbol dan angka lebih baik</li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mt-1">Simpan Perubahan</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                    <!--/ security -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection