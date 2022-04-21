@extends('layouts.backend.main')

@section('title', 'Edit Sertifikat')

@section('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
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
                            <h2 class="content-header-title float-start mb-0">Edit Sertifikat {{ $certificate->name }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.certificates.index') }}">List
                                            Sertifikat</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit Sertifikat
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
                <div class="row">
                    <div class="col-12">
                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Gambar dan Font</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" 
                                    class="validate-form pt-50" enctype="multipart/form-data">
                                    @method("PUT")
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-2">
                                            <label class="form-label" for="name">Nama Sertifikat</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                <input type="text" id="name" class="form-control" name="name"
                                                    value="{{ old('name', $certificate->name) }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="status">Status</label>
                                            <select data-placeholder="Pilih Status.." class="select2-icons form-select" id="status" name="status">
                                                <optgroup label="Pilih Status">
                                                    <option value="active" data-icon="check-circle" {{ ($certificate->status == 'active') ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" data-icon="x-circle" {{ ($certificate->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <input type="hidden" value="{{ old('code', $certificate->code) }}" name="code"/>
                                        <div class="col-12 mb-2">
                                            <div class="border rounded p-2">
                                                <h6 class="mb-1"><i data-feather='image'></i> Gambar Master Sertifikat</h6>
                                                <div class="d-flex flex-column flex-md-row">
                                                    <a id="pelaksana-preview-image" data-fancybox="banner-preview" data-src="{{ asset('storage/master-certificates/'.$certificate->code.'/'.$certificate->file_certificate) }}"><img src="{{ asset(asset('storage/master-certificates/'.$certificate->code.'/'.$certificate->file_certificate)) }}" id="pelaksana-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" /></a>
                                                    <div class="featured-info">
                                                        <small class="text-muted">Format file hanya .png dengan lebar max 1920px dan tinggi max 1280px</small>
                                                        <p class="my-50">
                                                            <a href="#" id="blog-image-text">*klik gambar untuk memperbesar*</a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <input class="form-control" type="file" id="pelaksanaCustomFile" accept="image/*" name="file_certificate" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="type">Font Master</label>
                                            <input class="form-control" type="file" id="formFile" accept=".ttf" name="file_font[master]">
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label" for="type">Font Nama</label>
                                            <input class="form-control" type="file" id="formFile" accept=".ttf" name="file_font[name]">
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label class="form-label" for="name_colour">Warna Nomor & Nama</label>
                                            <input class="form-control" type="color" id="name_colour" name="font_colour[number_name]" value="{{ $certificate->font_colour["number_name"] }}">
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label class="form-label" for="name_colour">Warna Judul & Tanggal</label>
                                            <input class="form-control" type="color" id="name_colour" name="font_colour[title_time]" value="{{ $certificate->font_colour["title_time"] }}">
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label class="form-label" for="name_colour">Warna Ketua & Pemateri</label>
                                            <input class="form-control" type="color" id="name_colour" name="font_colour[ketua_pemateri]" value="{{ $certificate->font_colour["ketua_pemateri"] }}">
                                        </div>
                                    </div>
                            </div>
                            <div class="card-header border-bottom border-top">
                                <h4 class="card-title">Atur Posisi</h4>
                            </div>
                            <div class="card-body mt-2">
                                    <div class="row">
                                        {{-- posisi x,y nomor --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nomor X & Y</label>
                                            <input class="form-control" type="text" name="position[number]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nomor Y</label>
                                            <input class="form-control" type="number" name="position[number][]">
                                        </div> --}}
                                        {{-- posisi x,y logo --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Logo X & Y</label>
                                            <input class="form-control" type="text" name="position[logo]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Logo Y</label>
                                            <input class="form-control" type="number" name="position[logo][y]">
                                        </div> --}}
                                        {{-- posisi x,y nama --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nama X</label>
                                            <input class="form-control" type="number" name="position[name][x]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nama Y</label>
                                            <input class="form-control" type="number" name="position[name][y]">
                                        </div> --}}
                                        {{-- posisi x,y title --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Judul X</label>
                                            <input class="form-control" type="number" name="position[title][x]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Judul Y</label>
                                            <input class="form-control" type="number" name="position[title][y]">
                                        </div> --}}
                                        {{-- posisi x,y tanggal --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Tanggal X</label>
                                            <input class="form-control" type="number" name="position[time][x]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Tanggal Y</label>
                                            <input class="form-control" type="number" name="position[time][y]">
                                        </div> --}}
                                        {{-- posisi x,y ttd ketua --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi TTD Ketua X</label>
                                            <input class="form-control" type="number" name="position[ttd_ketua][x]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi TTD Ketua Y</label>
                                            <input class="form-control" type="number" name="position[ttd_ketua][y]">
                                        </div> --}}
                                        {{-- posisi x,y ttd ketua --}}
                                        {{-- <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nama Ketua X</label>
                                            <input class="form-control" type="number" name="position[name_ketua][x]">
                                        </div>
                                        <div class="col-md-2 mb-1">
                                            <label class="form-label" for="type">Posisi Nama Ketua Y</label>
                                            <input class="form-control" type="number" name="position[name_ketua][y]">
                                        </div> --}}
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Buat
                                                Template</button>
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
    <script src="{{ asset('backend/app-assets/js/scripts/pages/page-blog-mscert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection

@section('js')
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend//app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script>
        Fancybox.bind('[data-fancybox="banner-preview"]', {
            groupAttr: false,
        });
    </script>
@endsection