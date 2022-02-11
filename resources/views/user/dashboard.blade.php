@extends('layouts.backend.main')

@section('title', 'Dashboard')

@section('content')
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
                                        <h1 class="mb-1 text-white">Halo {{ auth()->user()->name }}!👏,</h1>
                                        <p class="card-text m-auto w-75">
                                            Selamat Datang di Website <strong>ESeminar!</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-lg-8 col-12">
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
