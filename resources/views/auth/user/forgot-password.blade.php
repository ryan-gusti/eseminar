@extends('layouts.backend.auth.main')

@section('content')
<div class="auth-content my-auto">
    <div class="text-center">
      <h5 class="mb-0">Lupa Password</h5>
    </div>
    <div
      class="alert alert-info text-center mb-4 mt-4 pt-2"
      role="alert"
    >
      Masukkan email anda dan intruksi akan dikirim kepada anda!
    </div>
    @if (session('status') != null)
    <div class="alert alert-success">
      <span>{{session('status')}}</span>
    </div>
    @endif
    @error('email')
    <div class="alert alert-danger">
        <span>Email tersebut tidak ditemukan</span>
    </div>
    @enderror
    <form class="custom-form mt-4" action="{{ route('password.email') }}" method="POST">
        @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input
          type="text"
          class="form-control"
          id="email"
          placeholder="Enter email"
          name="email"
        />
      </div>
      <div class="mb-3 mt-4">
        <button
          class="btn btn-primary w-100 waves-effect waves-light"
          type="submit"
        >
          Ubah Password
        </button>
      </div>
    </form>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Ingat passwordnya?
        <a href="{{route('login')}}" class="text-primary fw-semibold">
          Masuk
        </a>
      </p>
    </div>
  </div>
@endsection