@extends('layouts.backend.main')

@section('title', 'Checkout')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/toastr.min.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/app-ecommerce.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-wizard.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-number-input.css') }}"> --}}
@endsection

@section('content')
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Checkout</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                </li>
                                <li class="breadcrumb-item active">Checkout
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="content-body">
                <div id="place-order" class="list-view product-checkout">
                    <!-- Checkout Place Order Left starts -->
                    <div class="checkout-items">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="app-ecommerce-details.html">
                                    <img src="{{ asset('storage/'.$event->banner) }}" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">{{ $event->title }}</a></h6>
                                    @foreach ($event->categories as $category)
                                    <span class="item-company"><a href="#" class="company-name">{{ $category->name }},</a></span>
                                    @endforeach
                                </div>
                                <span class="text-success mb-1">{{ $event->time }}</span>
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">Rp{{ $event->price }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Data Peserta</h4>
                                <p class="card-text text-muted mt-25">Pastikan data benar, jika ada kesalahan edit di menu profile</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="mb-2">
                                            <label class="form-label" cfor="nama-user">Nama Lengkap:</label>
                                            <input type="text" id="nama-user" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-2">
                                            <label class="form-label" cfor="phone-user">Nomor HP:</label>
                                            <input type="number" id="phone-user" class="form-control" name="phone" value="{{ Auth::user()->phone }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-2">
                                            <label class="form-label" cfor="email-user">Email :</label>
                                            <input type="text" id="email-user" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly />
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-next delivery-address">Save And Deliver Here</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Place Order Left ends -->

                    <!-- Checkout Place Order Right starts -->
                    <div class="checkout-options">
                        <div class="card">
                            <div class="card-body">
                                <div class="price-details">
                                    <h6 class="price-title">Detail Harga</h6>
                                    <ul class="list-unstyled">
                                        <li class="price-detail">
                                            <div class="detail-title">Jumlah Tiket</div>
                                            <div class="detail-amt">1</div>
                                        </li>
                                        <li class="price-detail">
                                            <div class="detail-title">Harga Tiket</div>
                                            <div class="detail-amt">Rp20.000</div>
                                        </li>
                                    </ul>
                                    <hr />
                                    <ul class="list-unstyled">
                                        <li class="price-detail">
                                            <div class="detail-title detail-total">Total</div>
                                            <div class="detail-amt fw-bolder">Rp20.000</div>
                                        </li>
                                    </ul>
                                    <form action="{{ route('checkout.store', $event->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 btn-next place-order">Pesan Tiket!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Place Order Right ends -->
                    </div>
                    <!-- Checkout Place order Ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/app-assets/js/scripts/pages/app-ecommerce-checkout.js') }}"></script>
@endsection