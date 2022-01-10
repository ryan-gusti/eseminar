@extends('layouts.backend.auth.main')

@section('content')
    {{-- <!-- Sign In Area -->
    <div class="sign-in-1">
        <div class="container">
            <div class="row justify-content-lg-end justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="sign-in-1-box justify-content-lg-end">
                        <div class="heading text-center">
                            <h2>Sign in</h2>
                        </div>
                        <form action="login" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="ex: john@email.com" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" id="password" class="form-control"
                                    placeholder="i.e. IAmthepreciouspass123 " />
                            </div>
                            <div class="keep-sign-area">
                                <div class="check-form d-inline-block">
                                    <label for="remember_me" class="check-input-control d-flex align-items-center mb-0">
                                        <input class="d-none" type="checkbox" id="remember_me" name="remember" />
                                        <span class="checkbox checkbox-2 rounded-check-box"></span>
                                        <span class="remember-text">Remember me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="sign-in-log-btn">
                                <button class="btn focus-reset">Submit</button>
                            </div>
                            <center>
                                <span>-Sign in with-</span>
                                <div class="sign-in-google-log-btn">
                                    <a href="{{ route('user.login.google') }}" class="btn focus-reset">
                                        <i class="fab fa-google me-2"></i>
                                    </a>
                                </div>
                            </center>
                            <div class="create-new-acc-text text-center">
                                <p>Lupa password? <a href="#">Reset Sekarang!</a></p>
                            </div>
                            <div class="create-new-acc-text text-center">
                                <p>
                                    Belum memiliki akun?
                                    <a href="{{ route('register') }}">Daftar Sekarang!</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Welcome Back !</h5>
            <p class="text-muted mt-2">Sign in to continue to Minia.</p>
        </div>
        <form class="custom-form mt-4 pt-2" action="login_sipt" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <label class="form-label">Password</label>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="">
                            <a href="auth-recoverpw" class="text-muted">Forgot password?</a>
                        </div>
                    </div>
                </div>

                <div class="input-group auth-pass-inputgroup">
                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password"
                        aria-describedby="password-addon" id="password" name="password">
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
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>
        </form>

        <div class="mt-4 pt-2 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
            </div>

            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('user.login.google') }}"
                        class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-5 text-center">
            <p class="text-muted mb-0">Don't have an account ? <a href="auth-register" class="text-primary fw-semibold">
                    Signup now </a> </p>
        </div>
    </div>

@endsection
