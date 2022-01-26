@extends('layouts.backend.main')

@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/trix.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/forms/select/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
@endsection

@section('title', 'Buat Event')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Buat Event</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active">Form Wizard
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
                        <h4 class="alert-heading d-flex align-items-center">Daftar Gagal!</h4>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form" action="{{ route('partner.store-event') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label" for="quota">Jenis Event</label><br />
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1" checked onclick="lokasi(0)" />
                                            <label class="form-check-label" for="inlineRadio1">Offline</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2" onclick="lokasi(1)" />
                                            <label class="form-check-label" for="inlineRadio2">Online</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="title">Judul Event</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="title" class="form-control" name="title" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="slug">Slug</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="hash"></i></span>
                                                    <input type="text" id="slug" class="form-control" name="slug"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-1">
                                                <label class="form-label" for="modern-email">Deskripsi</label>
                                                <input id="description" type="hidden" name="description">
                                                <trix-editor input="description"></trix-editor>
                                            </div>

                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="banner">Banner Event</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="image"></i></span>
                                                    <input class="form-control" type="file" id="banner" name="banner" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="quota">Kouta Peserta</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="quota" class="form-control" name="quota" />
                                                    <span class="input-group-text">Peserta</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label class="form-label" for="time">Tanggal & Jam</label>
                                                <input type="text" id="time" class="form-control flatpickr-date-time"
                                                    placeholder="YYYY-MM-DD HH:MM" name="time" />
                                            </div>
                                            <div class="col-md-12 col-12 mb-1" id="alamatForm">
                                                <label class="form-label" for="location">Alamat Lokasi</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                                                    <input type="text" class="form-control" id="location"
                                                        name="location" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-1" id="linkForm">
                                                <label class="form-label" for="link">Link Online
                                                    Meet</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="link"></i></span>
                                                    <input type="text" class="form-control" id="link" name="link" />
                                                </div>
                                            </div>
                                            {{-- <div class="mb-1">
                                                <label class="form-label" for="normalMultiSelect">Pilih Kategori</label>
                                                <select class="form-select" id="normalMultiSelect" multiple="multiple"
                                                    name="category_id[]">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="col-md-8 mb-1">
                                                <label class="form-label" for="select2-multiple">Kategori</label>
                                                <select class="select2 form-select" id="select2-multiple" multiple
                                                    name="category_id[]">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="price">Harga Tiket</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" id="price" class="form-control" name="price" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
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

@section('js')
    <script src="{{ asset('backend/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/trix.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/partner/event/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        window.onload = function() {
            lokasi(0);
        };

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function lokasi(x) {
            if (x == 0) {
                document.getElementById('alamatForm').style.display = 'block';
                document.getElementById('linkForm').style.display = 'none';
            } else {
                document.getElementById('alamatForm').style.display = 'none';
                document.getElementById('linkForm').style.display = 'block';
            }
            return;
        }
    </script>
@endsection
