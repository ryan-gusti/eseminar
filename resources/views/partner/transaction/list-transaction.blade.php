@extends('layouts.backend.main')

@section('title', 'List Transaksi')

@section('vendor-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/fancybox.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/> --}}
@endsection

@php
    // get code absence from db
    $code = $event->code_presence;
    // $slug = $event->slug;
    $url = url('absen/'.$code);
@endphp

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">List Peserta Event</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">List Peserta Event</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            <div class="card">
        <div class="card-header">
          <h4 class="card-title">Link Absensi Peserta</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Gunakan link dibawah ini untuk peserta dapat melakukan absensi secara mandiri, absensi otomatis dibuka ketika tanggal event dimulai.
          </p>
          <div class="row">
            <div class="col-md-6 col-12 mb-1">
              <div class="input-group">
                <input type="text" class="form-control" value="{{ $url }}" aria-describedby="button-addon2" disabled>
                <button class="btn btn-outline-primary waves-effect" id="button-addon2" type="button">Salin Link</button>
              </div>
            </div>
          </div>
        </div>
      </div>
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Waktu Daftar</th>
                                            <th>Status</th>
                                            <th>Kehadiran</th>
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
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'user.name',
                    name: 'name'
                },
                {
                    data: 'user.email',
                    name: 'email'
                },
                {
                    data: 'user.phone',
                    name: 'phone'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'presence',
                    name: 'presence',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                }
            ],
            columnDefs: [{
                targets: 1,
                responsivePriority: 1
            }],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [10, 25, 50, 75, 100],
            buttons: [{
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['share'].toSvg({
                    class: 'font-small-4 me-50'
                }) + 'Export',
                buttons: [{
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ],
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function() {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass(
                            'd-inline-flex');
                    }, 50);
                }
            }],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Detail dari ' + data['title'];
                        }
                    }),
                    type: 'column',
                    renderer: function(api, rowIdx, columns) {
                        var data = $.map(columns, function(col, i) {
                            return col.title !==
                                '' // ? Do not show row in modal popup if title is blank (for check box)
                                ?
                                '<tr data-dt-row="' +
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
                                '</tr>' :
                                '';
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
        $('div.head-label').html('<h6 class="mb-0">List Transaksi</h6>');
    </script>
@endsection
