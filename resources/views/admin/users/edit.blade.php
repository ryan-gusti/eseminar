@extends('layouts.backend.main')

@section('title', 'Ubah Data User')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/select/select2.min.css') }}"> --}}
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Ubah Data User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">List User</a>
                                </li>
                                <li class="breadcrumb-item active"> Ubah Data
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
                    </ul>

                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Detail User</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                  <i data-feather="check-circle" class="me-50"></i>
                                  <span>{{session('message')}}</span>
                                </div>
                              </div>
                            @endif
                            <!-- header section -->
                            {{-- <div class="d-flex">
                                <a href="#" class="me-25">
                                    <img @if (Auth::user()->picture == null)
                                    src="https://ui-avatars.com/api/?size=128&name={{ Auth::user()->name }}"
                                    @else
                                    src="{{ Auth::user()->picture }}"
                                    @endif 
                                    id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                </a>
                                <!-- upload and reset button -->
                                <div class="d-flex align-items-end mt-75 ms-1">
                                    <div>
                                        <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                        <input type="file" id="account-upload" hidden accept="image/*" />
                                        <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                        <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                    </div>
                                </div>
                                <!--/ upload and reset button -->
                            </div> --}}
                            <!--/ header section -->

                            <!-- form -->
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="validate-form mt-2 pt-50">
                            @method("PUT")
                            @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" data-msg="Please enter first name" />
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
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="08xxxxx" value="{{ old('phone', $user->phone) }}" data-msg="Please enter last name" />
                                        @error('phone')
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                              <i data-feather="info" class="me-50"></i>
                                              <span>{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ old('email', $user->email) }}" data-msg="Please enter last name" />
                                        @error('email')
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                              <i data-feather="info" class="me-50"></i>
                                              <span>{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label" for="role">Role</label>
                                        <select data-placeholder="Pilih Role.." class="select2-icons form-select" id="role" name="role">
                                            <optgroup label="Pilih Role">
                                                <option value="admin" data-icon="shield" {{ ($user->role == 'admin') ? 'selected' : '' }}>ADMIN</option>
                                                <option value="partner" data-icon="user-check" {{ ($user->role == 'partner') ? 'selected' : '' }}>PARTNER</option>
                                                <option value="user" data-icon="user" {{ ($user->role == 'user') ? 'selected' : '' }}>USER</option>
                                            </optgroup>
                                        </select>
                                        @error('role')
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                              <i data-feather="info" class="me-50"></i>
                                              <span>{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin diubah!" />
                                        @error('password')
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body d-flex align-items-center">
                                              <i data-feather="info" class="me-50"></i>
                                              <span>{{ $message }}</span>
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 me-1">Simpan Perubahan</button>
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

@section('js')
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend//app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection