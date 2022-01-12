@extends('layouts.backend.main')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm order-2 order-sm-1">
                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xl me-3">
                                                    <img class="img-fluid rounded-circle d-block" src=@if (Auth::user()->picture == null)
                                                        "https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                                        @else
                                                        "{{ Auth::user()->picture }}""
                                                        @endif alt="Header Avatar">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                                                <p class="text-muted font-size-13"> </p>

                                                <div
                                                    class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                    <div><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Member
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto order-1 order-sm-2">
                                    <div class="d-flex align-items-start justify-content-end gap-2">
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview"
                                        role="tab">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Ubah Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Ubah Password</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Overview</h5>
                                </div>
                                <div class="card-body">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            <span>{{session('message')}}</span>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="pb-3">
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div>
                                                        <h5 class="font-size-14">QR Code :</h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl">
                                                    <div class="text-muted">
                                                        <p class="mb-2"><img
                                                                src="https://v1.slashapi.com/solo/qr-code/7QtwLV8oHF?text={{ Auth::user()->email }}"
                                                                width="100" height="100"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-3">
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div>
                                                        <h5 class="font-size-14">Alamat Email :</h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl">
                                                    <div class="text-muted">
                                                        <p class="mb-2">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3">
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div>
                                                        <h5 class="font-size-15">Nomor HP :</h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl">
                                                    <div class="text-muted">
                                                        @if (Auth::user()->phone == null)
                                                            <p>Tidak ada Nomor</p>
                                                        @endif
                                                        <p>{{ Auth::user()->phone }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="about" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">About</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form method="POST" action="{{ route('user.profile.update') }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Ubah Nama</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" value="{{Auth::user()->name}}" id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Ubah Nomor HP</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" value="{{Auth::user()->phone}}" id="phone" name="phone" placeholder="08xxxxxx">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="col-6">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Simpan Profil</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="post" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Password</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form action="{{ route('user.password.update') }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Password Sekarang </label>
                                                <div class="col-6">
                                                    <input class="form-control" type="password" id="current_password" name="current_password">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="password" id="password" name="password">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="col-6">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Ubah Password</button>
                                                </div>
                                            </div>
                                         </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    @endsection
