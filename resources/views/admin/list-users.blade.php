@extends('layouts.backend.main')

@section('title', 'List Users')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Kelola User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">List User</a>
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
                                        <th>Nama</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Verified</th>
                                        <th>Role</th>
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
@endsection

@section('js')
    <script src="https://kit.fontawesome.com/d0d9b5d9c4.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('backend/app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script> --}}
    <script type="text/javascript">
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
            { data: 'phone', name: 'phone'},
            { data: 'email', name: 'email'},
            { data: 'email_verified_at', name: 'email_verified_at'},
            { data: 'role', name: 'role'},
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
            extend: 'collection',
            className: 'btn btn-outline-secondary dropdown-toggle me-2',
            text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
            buttons: [
                {
                extend: 'print',
                text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                },
                {
                extend: 'csv',
                text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                },
                {
                extend: 'excel',
                text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                },
                {
                extend: 'pdf',
                text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                },
                {
                extend: 'copy',
                text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                className: 'dropdown-item',
                exportOptions: { columns: [0, 1, 2, 3, 4, 5] }
                }
            ],
            init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
                $(node).parent().removeClass('btn-group');
                setTimeout(function () {
                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                }, 50);
            }
            },
            {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Tambah Users',
            className: 'create-new btn btn-primary',
            action: function ( e, dt, button, config ) {
                window.location = '{{ route('admin.events.create') }}';
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
    $('div.head-label').html('<h6 class="mb-0">List Users</h6>');

    </script>
@endsection
