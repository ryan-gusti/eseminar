@extends('layouts.backend.main')

@section('title', 'Dashboard Partner')

@section('content')
    {{-- {{ dd($announcements) }} --}}
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row match-height">
                        <!-- Greetings Card starts -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="{{ asset('backend/app-assets/images/elements/decore-left.png') }}"
                                        class="congratulations-img-left" alt="card-img-left" />
                                    <img src="{{ asset('backend/app-assets/images/elements/decore-right.png') }}"
                                        class="congratulations-img-right" alt="card-img-right" />
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Halo Partner {{ auth()->user()->name }}!👏,</h1>
                                        <p class="card-text m-auto w-75">
                                            Selamat Datang di Website <strong>ESeminar!</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Greetings Card ends -->

                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Akun</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="award" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $totalEvent }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Event</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $totalPeserta }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Peserta</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">Rp{{ $totalSaldo }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Saldo</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="radio" class="user-timeline-title-icon"></i>
                                        <h4 class="card-title">Informasi Terbaru</h4>
                                    </div>
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline ms-50">
                                        @forelse($announcements as $announcement)
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6>{{ $announcement->title }}</h6>
                                                    </div>
                                                    <p>{{ $announcement->body }}</p>
                                                    <footer class="blockquote-footer text-end">
                                                        {{ date('l d F Y', strtotime($announcement->created_at)) }}
                                                    </footer>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6>Belum ada informasi terbaru</h6>
                                                    </div>
                                                    <p>-</p>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
@endsection
