@extends('layouts.backend.main')

@section('title', 'Atur Sertifikat Event')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/fancybox.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
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
                        <h2 class="content-header-title float-start mb-0">Atur Sertifikat</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('partner.events.index') }}">List Event</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Sertifikat</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Sertifikat</th>
                                        <th>Template</th>
                                        <th>File Font</th>
                                        <th>Warna No & Nama</th>
                                        <th>Warna Judul & Waktu</th>
                                        <th>Warna Ketua & Pemateri</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
</div>
</div>
@endsection

@section('vendor-js')
<script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection

@section('js')
    <script src="https://kit.fontawesome.com/d0d9b5d9c4.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('backend/app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script> --}}
    
    <script type="text/javascript">
    Fancybox.bind('[data-fancybox="sertifikat-preview"]', {
        groupAttr: false,
        });
    var datatable = $('.datatables-basic').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url()->current() !!}'
        },
        columns: [
            // { data: 'DT_RowIndex', name: 'DT_RowIndex',  searchable: false, orderable: true},
            { data: 'id', name: 'id'},
            { data: 'name', name: 'name'},
            { data: 'file_certificate', name: 'file_certificate'},
            { data: 'file_font', name: 'file_font'},
            { data: 'font_colour.number_name', name: 'font_colour'},
            { data: 'font_colour.title_time', name: 'font_colour'},
            { data: 'font_colour.ketua_pemateri', name: 'font_colour'},
            { data: 'status', name: 'status'},
            { 
                data: 'action', 
                name: 'action',
                orderable: false,
                searchable: false,
            }
        ],
        columnDefs: [
            { targets: 1, responsivePriority: 1}
        ],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 10,
        lengthMenu: [10, 25, 50, 75, 100],
        buttons: [
            {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Tambah Sertifikat',
            className: 'create-new btn btn-primary',
            action: function ( e, dt, button, config ) {
                window.location = '{{ route('admin.certificates.create') }}';
            }
            }
        ],
        responsive: {
            details: {
            display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                var data = row.data();
                return 'Detail dari ' + data['title'];
                }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                    ? '<tr data-dt-row="' +
                        col.rowIdx +
                        '" data-dt-column="' +
                        col.columnIndex +
                        '">' +
                        '<td>' +
                        col.title +
                        ':' +
                        '</td> ' +
                        '<td>' +
                        col.data +
                        '</td>' +
                        '</tr>'
                    : '';
                }).join('');

                return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
            }
            }
        },
        language: {
            paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
            }
        }
    });
    $('div.head-label').html('<h6 class="mb-0">List Event</h6>');

    </script>
@endsection
