@extends('layouts.frontend.main')

@section('content')
    <!-- Sign In Area -->
    <div class="sign-in-1">
        <div class="container">
            <div class="row justify-content-lg-end justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="sign-in-1-box justify-content-lg-end">
                        <div class="heading text-center">
                            <h2>Sign in</h2>
                        </div>
                        <form action="#">
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
                                    <label for="terms-check"
                                        class="
                          check-input-control
                          d-flex
                          align-items-center
                          mb-0
                        ">
                                        <input class="d-none" type="checkbox" id="terms-check" />
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
                                    <button class="btn focus-reset">
                                        <i class="fab fa-google me-2"></i>
                                    </button>
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
    </div>
@endsection
