@extends('layouts.backend.main')

@section('title', 'My Transactions')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Transaksi Saya</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">List Transaksi</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Card Advance -->
                <div class="row">
                    @forelse ($transactions as $transaction)
                        {{-- {{ dd($ticket->event->certificate->sertifikat) }} --}}
                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    {{-- <img src="{{ asset('backend/app-assets/images/illustration/email.svg') }}" alt="Meeting Pic" height="170" /> --}}
                                    @if (!$transaction->event->banner)
                                        <img src="{{ asset('storage/deleted-event.png') }}" alt="Meeting Pic" height="200"
                                            class="img-fluid" />
                                    @else
                                        <img src="{{ asset('storage/banner-event/' . $transaction->event->banner) }}" height="200" style="max-width: 300px;" alt="Meeting Pic" />
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        {{-- <div class="meetup-day">
                                            <h6 class="mb-0">Test
                                            </h6>
                                        </div> --}}
                                        <div class="my-auto">
                                            {{-- <h4 class="card-title mb-25">{{ $ticket->event->title }}</h4> --}}
                                            <a href="{{ route('event', $slug = $transaction->event->slug) }}">
                                                <h4 class="card-title mb-25">{{ $transaction->event->title }}</h4>
                                            </a>
                                            <p class="card-text mb-0">Webinar</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1 me-1 d-flex align-items-center">
                                            <div class="avatar-content">
                                                <i data-feather="hash" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Order ID</h6>
                                            <small>{{ $transaction->invoice }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1 d-flex align-items-center">
                                            <div class="avatar-content">
                                                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Tanggal Transaksi</h6>
                                            <small>{{ date('j/n/y H:i', strtotime($transaction->created_at)) }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1 d-flex align-items-center">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Jumlah Pembayaran</h6>
                                            @if($transaction->item_price == 0)
                                                <small>GRATIS</small>
                                            @else
                                                <small>Rp{{ number_format($transaction->item_price) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1 d-flex align-items-center">
                                            <div class="avatar-content">
                                                <i data-feather="info" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body me-1 d-flex align-items-center">
                                            {{-- <h6 class="mb-0">Status</h6> --}}
                                            @if ($transaction->payment_status == 'paid')
                                                <span class="badge badge-glow bg-success">Transaksi Berhasil</span>
                                            @elseif ($transaction->payment_status == 'pending')
                                                <span class="badge badge-glow bg-warning">Transaksi Pending</span>
                                            @elseif ($transaction->payment_status == 'expire')
                                                <span class="badge badge-glow bg-secondary">Transaksi Kadaluarsa</span>
                                            @elseif ($transaction->payment_status == 'failed')
                                                <span class="badge badge-glow bg-danger">Transaksi Gagal</span>
                                            @else
                                                <span class="badge badge-glow bg-warning">Menunggu Pembayaran</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- cek apakah transaksi masih pending --}}
                                    @if ($transaction->payment_status == 'waiting')
                                    <div class="row text-center">
                                        <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ $transaction->midtrans_url }}" target="_blank" class="btn btn-block btn-primary waves-effect waves-float waves-light"><i data-feather="dollar-sign" class="me-25"></i>Bayar</a>
                                            <a href="{{ route('user.transaction.delete', $transaction->id) }}" class="btn btn-block btn-danger waves-effect waves-float waves-light"><i data-feather="x-circle" class="me-25"></i>Batal</a>
                                        </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->
                    @empty
                        <div class="misc-inner p-2 p-sm-3">
                            <div class="w-100 text-center">
                                <h2 class="mb-1">Belum ada Transaksi 🕵🏻‍♀️</h2>
                                <p class="mb-2">Oops! 😖 Sepertinya kamu belum pernah membeli event.</p><a
                                    class="btn btn-primary mb-2 btn-sm-block" href="{{ route('events') }}">Cari
                                    Event</a><br><img class="img-fluid"
                                    src="{{ asset('backend/app-assets/images/pages/error.svg') }}" alt="Error page" />
                            </div>
                        </div>
                    @endforelse
                </div>

                <!--/ Card Advance -->

            </div>
        </div>
    </div>
@endsection
