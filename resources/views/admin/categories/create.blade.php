@extends('layouts.backend.main')

@section('title', 'Buat Kategori Baru')

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
                            <h2 class="content-header-title float-start mb-0">Buat Kategori Baru</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">List
                                            Kategori</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Tambah Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Buat Kategori Baru</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form action="{{ route('admin.categories.store') }}" method="POST"
                                    class="validate-form mt-2 pt-50" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ old('title') }}" data-msg="Please enter title" />
                                            @error('title')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="slug">Slug</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="hash"></i></span>
                                                <input type="text" id="slug" class="form-control" name="slug"
                                                    value="{{ old('slug') }}" readonly />
                                            </div>
                                            @error('slug')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="border rounded p-2">
                                                <h6 class="mb-1"><i data-feather='image'></i> Upload Gambar</h6>
                                                <div class="d-flex flex-column flex-md-row">
                                                    <a id="banner-preview-image" data-fancybox="banner-preview"
                                                        data-src="{{ asset('storage/banner-event/banner-event.png') }}"><img
                                                            src="{{ asset('storage/banner-event/banner-event.png') }}"
                                                            id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                            width="170" height="110" alt="Blog Featured Image" /></a>
                                                    <div class="featured-info">
                                                        <small class="text-muted">Required image resolution 800x400,
                                                            image size 10mb.</small>
                                                        <p class="my-50">
                                                            <a href="#" id="blog-image-text">*klik gambar untuk
                                                                memperbesar*</a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <input class="form-control" type="file" id="blogCustomFile"
                                                                accept="image/*" name="image" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Buat
                                                Kategori</button>
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

@section('page-js')
    <script src="{{ asset('backend/app-assets/js/scripts/pages/page-blog-edit.js') }}"></script>
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
    </script>
@endsection
