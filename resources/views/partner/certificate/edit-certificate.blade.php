@extends('layouts.backend.main')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/trix.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
@endsection

@section('css')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endsection

@section('title', 'Edit Sertifikat Event')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Edit Sertifikat Event</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('partner.events.index') }}">List Event</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit Sertifikat
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading d-flex align-items-center">Terjadi Kesalahan!</h4>
                        <div class="alert-body">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    {{-- {{ dd($eventCertificate->event->slug) }} --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form" action="{{ route('partner.certificate.update', $eventCertificate->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="ketua_pelaksana">Ketua Pelaksana</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="ketua_pelaksana" class="form-control" name="ketua_pelaksana" value="{{ old('ketua_pelaksana', $eventCertificate->ketua_pelaksana) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="pemateri">Pemateri</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="pemateri" class="form-control" name="pemateri" value="{{ old('pemateri', $eventCertificate->pemateri) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="pemateri">Nomor Sertifikat</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="no_certificate" class="form-control" name="no_certificate" value="{{ old('no_certificate', $eventCertificate->no_certificate) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-1">
                                                <label class="form-label" for="modern-email">Deskripsi</label>
                                                <input id="text" type="hidden" name="text" value="{{ old('text') }}">
                                                <trix-editor input="text"></trix-editor>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h6 class="mb-1"><i data-feather='image'></i> TTD Ketua Pelaksana</h6>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a id="pelaksana-preview-image" data-fancybox="banner-preview" data-src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->ttd_pelaksana.'') }}"><img src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->ttd_pelaksana.'') }}" id="pelaksana-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" /></a>
                                                        <div class="featured-info">
                                                            <small class="text-muted">Format file hanya .png dengan lebar max 362px dan tinggi max 150px</small>
                                                            <p class="my-50">
                                                                <a href="#" id="blog-image-text">*klik gambar untuk memperbesar*</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <input class="form-control" type="file" id="pelaksanaCustomFile" accept="image/*" name="ttd_pelaksana" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h6 class="mb-1"><i data-feather='image'></i> TTD Pemateri</h6>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a id="pemateri-preview-image" data-fancybox="banner-preview" data-src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->ttd_pemateri.'') }}"><img src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->ttd_pemateri.'') }}" id="pemateri-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" /></a>
                                                        <div class="featured-info">
                                                            <small class="text-muted">Format file hanya .png dengan lebar max 362px dan tinggi max 150px</small>
                                                            <p class="my-50">
                                                                <a href="#" id="blog-image-text">*klik gambar untuk memperbesar*</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <input class="form-control" type="file" id="pemateriCustomFile" accept="image/*" name="ttd_pemateri" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h6 class="mb-1"><i data-feather='image'></i> Upload Logo</h6>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a id="logo-preview-image" data-fancybox="banner-preview" data-src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->logo.'') }}"><img src="{{ asset('storage/certificate-event/'.$eventCertificate->event->slug.'/'.$eventCertificate->logo.'') }}" id="logo-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" /></a>
                                                        <div class="featured-info">
                                                            <small class="text-muted">Format file hanya .png dengan lebar max 150px dan tinggi max 87px</small>
                                                            <p class="my-50">
                                                                <a href="#" id="blog-image-text">*klik gambar untuk memperbesar*</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <input class="form-control" type="file" id="logoCustomFile" accept="image/*" name="logo" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Ubah Sertifikat</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
<script src="{{ asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/trix.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('backend/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/pages/page-certificate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection

@section('js')

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('{{ route('partner.checkslug') }}?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        Fancybox.bind('[data-fancybox="banner-preview"]', {
        groupAttr: false,
        });
    </script>

@endsection
