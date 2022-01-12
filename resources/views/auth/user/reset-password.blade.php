@extends('layouts.backend.auth.main')

@section('content')
    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Atur Ulang Password !</h5>
            <p class="text-muted mt-2">Silahkan isi password baru anda dibawah.</p>
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
        <form class="custom-form mt-4 pt-2" action="{{ route('password.update') }}" method="POST">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email', $request->email) }}">
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
                        <label class="form-label">Konfirmasi Password</label>
                    </div>
                </div>

                <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password"
                        aria-describedby="password-addon" id="password_confirmation" name="password_confirmation">
                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                            class="mdi mdi-eye-outline"></i></button>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Ubah Password</button>
            </div>
        </form>

        <div class="mt-4 pt-2 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Masuk melalui -</h5>
            </div>
        </div>

        <div class="mt-5 text-center">
            <p class="text-muted mb-0">Belum memiliki akun ? <a href="{{route('register')}}" class="text-primary fw-semibold">
                    Daftar Sekarang! </a> </p>
        </div>
    </div>

@endsection
