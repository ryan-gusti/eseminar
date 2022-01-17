@extends('layouts.backend.auth.main')

@section('content')
    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Daftar Akun ESeminar !</h5>
            <p class="text-muted mt-2">Isi data berikut untuk mendaftar.</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="custom-form mt-4 pt-2" action="register" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="email@domain.com" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="phone" placeholder="08xxxxx" name="phone">
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <label class="form-label">Password</label>
                    </div>
                </div>

                <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password"
                        aria-describedby="password-addon" id="password" name="password">
                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                            class="mdi mdi-eye-outline"></i></button>
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <label class="form-label">Ulangi Password</label>
                    </div>
                </div>

                <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password"
                        aria-describedby="password-addon" id="password_confirmation" name="password_confirmation">
                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                            class="mdi mdi-eye-outline"></i></button>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-check">
                        <label class="form-check-label" for="remember-check">
                            Remember me
                        </label>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Daftar</button>
            </div>
        </form>

        <div class="mt-4 pt-2 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Daftar melalui -</h5>
            </div>

            <ul class="list-inline mb-0">
                {{-- <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li> --}}
                {{-- <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li> --}}
                <li class="list-inline-item">
                    <a href="{{ route('user.login.google') }}"
                        class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-5 text-center">
            <p class="text-muted mb-0">Sudah memiliki akun ? <a href="{{route('login')}}" class="text-primary fw-semibold">
                    Masuk </a> </p>
        </div>
    </div>

@endsection
