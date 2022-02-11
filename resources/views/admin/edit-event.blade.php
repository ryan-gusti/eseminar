@extends('layouts.backend.main')

@section('vendor-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/trix.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection

@section('css')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
@endsection

@section('title', 'Edit Event')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Edit Event</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">List Event</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit Event
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar me-75">
                                        @if ($event->user->picture)
                                            <img src="{{ asset('storage/user-image/'.$event->user->picture) }}"
                                                width="38" height="38" alt="Avatar" />
                                        @else
                                        <img src="{{ asset('storage/user-image/avatar.png') }}" alt="Avatar"
                                                    width="38" height="38">
                                        @endif
                                        </div>
                                        <div class="author-info mb-2">
                                            <h6 class="mb-25">{{ $event->user->name }}</h6>
                                            <p class="card-text">Partner</p>
                                        </div>
                                    </div>
                                    <form class="form" action="{{ route('admin.events.update', $event->slug) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <label class="form-label" for="type_event">Jenis Event</label><br />
                                        <div class="form-check form-check-inline mb-1">
                                            <input class="form-check-input" type="radio" name="type" id="type_event"
                                                value="offline" {{ $event->type == 'offline' ? 'checked' : '' }} />
                                            <label class="form-check-label">Offline</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="type_event"
                                                value="online" {{ $event->type == 'online' ? 'checked' : '' }} />
                                            <label class="form-check-label">Online</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="title">Judul Event</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="title" class="form-control" name="title"
                                                        value="{{ old('title', $event->title) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="slug">Slug</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="hash"></i></span>
                                                    <input type="text" id="slug" class="form-control" name="slug"
                                                        value="{{ old('slug', $event->slug) }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-1">
                                                <label class="form-label" for="modern-email">Deskripsi</label>
                                                <input id="description" type="hidden" name="description"
                                                    value="{{ old('description', $description) }}">
                                                <trix-editor input="description"></trix-editor>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h6 class="mb-1"><i data-feather='image'></i> Upload Banner
                                                    </h6>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a id="banner-preview-image" data-fancybox="banner-preview"
                                                            data-src="{{ asset('storage/' . $event->banner) }}"><img
                                                                src="{{ asset('storage/' . $event->banner) }}"
                                                                id="blog-feature-image"
                                                                class="rounded me-2 mb-1 mb-md-0 img-fluid" width="170"
                                                                height="110" alt="Blog Featured Image" /></a>
                                                        <div class="featured-info">
                                                            <small class="text-muted">Required image resolution 800x400,
                                                                image size 10mb.</small>
                                                            <p class="my-50">
                                                                <a href="#" id="blog-image-text">*klik gambar untuk
                                                                    memperbesar*</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <input class="form-control" type="file"
                                                                    id="blogCustomFile" accept="image/*" name="banner" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="quota">Kouta Peserta</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="quota" class="form-control" name="quota"
                                                        value="{{ old('quota', $event->quota) }}" />
                                                    <span class="input-group-text">Peserta</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label class="form-label" for="time">Tanggal & Jam</label>
                                                <input type="text" id="time" class="form-control flatpickr-date-time"
                                                    value="{{ old('time', $event->time) }}"
                                                    placeholder="YYYY-MM-DD HH:MM" name="time" />
                                            </div>
                                            <div class="col-md-12 col-12 mb-1" id="alamatForm">
                                                <label class="form-label" for="location_link">Alamat Lokasi / Link
                                                    Online Meet</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                                                    <input type="text" class="form-control" id="location_link"
                                                        name="location_link"
                                                        value="{{ old('location_link', $event->location_link) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label class="form-label" for="select2-multiple">Kategori</label>
                                                <select class="select2 form-select" id="select2-multiple" multiple
                                                    name="category_id[]">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $event->category_id->contains($category->id) ? 'selected' : '' }}>
                                                            {{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="price">Harga Tiket</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" id="price" class="form-control" name="price" placeholder="Kosongkan jika ingin Gratis"
                                                        value="{{ old('price', $event->price) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 mb-1">
                                                <label class="form-label" for="select2-icons">Status</label>
                                                <select data-placeholder="Pilih Status.." class="select2-icons form-select"
                                                    id="select2-icons" name="status">
                                                    <optgroup label="Pilih Status">
                                                        <option value="open" data-icon="check-circle"
                                                            {{ $event->status == 'open' ? 'selected' : '' }}>OPEN
                                                        </option>
                                                        <option value="pending" data-icon="help-circle"
                                                            {{ $event->status == 'pending' ? 'selected' : '' }}>PENDING
                                                        </option>
                                                        <option value="rejected" data-icon="frown"
                                                            {{ $event->status == 'rejected' ? 'selected' : '' }}>
                                                            REJECTED</option>
                                                        <option value="close" data-icon="x-circle"
                                                            {{ $event->status == 'close' ? 'selected' : '' }}>CLOSED
                                                        </option>
                                                    </optgroup>
                                                </select>
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

@section('vendor-js')
    <script src="{{ asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/trix.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('backend/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection

@section('js')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('{{ route('admin.checkslug') }}?title=' + title.value)
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
