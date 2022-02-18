@extends('layouts.backend.main')

@section('title', 'Edit Transaksi')

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
                            <h2 class="content-header-title float-start mb-0">Edit Transaksi</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">List
                                            Transaksi</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit Transaksi
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-6">
                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Edit Transaksi {{ $transaction->midtrans_booking_code }}</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST"
                                    class="validate-form mt-2 pt-50">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                        <label class="form-label" for="status">Status Transaksi</label>
                                        <select data-placeholder="Pilih Status.." class="select2-icons form-select" id="status" name="payment_status">
                                            <optgroup label="Pilih Status">
                                                <option value="paid" data-icon="check-circle" {{ ($transaction->payment_status == 'paid') ? 'selected' : '' }}>Pembayaran Berhasil</option>
                                                <option value="pending" data-icon="clock" {{ ($transaction->payment_status == 'pending') ? 'selected' : '' }}>Pembayaran Pending</option>
                                                <option value="failed" data-icon="x-circle" {{ ($transaction->payment_status == 'failed') ? 'selected' : '' }}>Pembayaran Gagal</option>
                                                <option value="expire" data-icon="lock" {{ ($transaction->payment_status == 'expire') ? 'selected' : '' }}>Pembayaran Expire</option>
                                                <option value="waiting" data-icon="clock" {{ ($transaction->payment_status == 'waiting') ? 'selected' : '' }}>Menunggu Pembayaran</option>
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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Ubah
                                                Transaksi</button>
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
    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection
