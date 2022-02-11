@extends('layouts.backend.main')

@section('title', 'Edit Informasi')

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
                            <h2 class="content-header-title float-start mb-0">Edit Informasi</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">List
                                            Informasi</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit Data
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
                                <h4 class="card-title">Edit Informasi</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST"
                                    class="validate-form mt-2 pt-50">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ old('title', $announcement->title) }}"
                                                data-msg="Please enter title" />
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
                                            <label class="form-label" for="type">Untuk</label>
                                            <select data-placeholder="Pilih Role.." class="select2-icons form-select"
                                                id="type" name="type">
                                                <optgroup label="Pilih Role">
                                                    <option value="partner" data-icon="user-check"
                                                        {{ $announcement->type == 'partner' ? 'selected' : '' }}>PARTNER
                                                    </option>
                                                    <option value="user" data-icon="user"
                                                        {{ $announcement->type == 'user' ? 'selected' : '' }}>USER
                                                    </option>
                                                </optgroup>
                                            </select>
                                            @error('type')
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-0 mt-1">
                                                <textarea data-length="100" class="form-control char-textarea"
                                                    id="textarea-counter" rows="3" placeholder="Counter"
                                                    style="height: 100px" name="body">{{ $announcement->body }}</textarea>
                                                <label for="textarea-counter">Isi informasi</label>
                                            </div>
                                            <small class="textarea-counter-value float-end"><span
                                                    class="char-count">0</span> / 100 </small>
                                            @error('body')
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
                                                Informasi</button>
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
