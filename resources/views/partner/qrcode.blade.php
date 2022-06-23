@extends('layouts.backend.main')

@section('title', 'Dashboard Partner')

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
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                    <i data-feather="camera" class="user-timeline-title-icon"></i>
                                    <h4 class="card-title">Absensi dengan QRCode</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="reader" width="600px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="user-check" class="user-timeline-title-icon"></i>
                                        <h4 class="card-title">Data Peserta</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-warning d-none" id="dataTidakAda">
                                        <h2 class="text-capitalize">data tidak ditemukan</h2>
                                    </div>
                                    <div class="table-responsive" id="dataDitemukan">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Info</th>
                                            <th>Data</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>No Invoice</td>
                                            {{-- <td id="invoice">Belum ditemukan.</td> --}}
                                            <td>
                                            <span class="badge badge-glow bg-primary" id="invoice">Belum Ditemukan.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Peserta</td>
                                            <td id="name">Belum ditemukan.</td>
                                        </tr>
                                        <tr>
                                            <td>Judul Event</td>
                                            <td id="event">Belum ditemukan.</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Daftar</td>
                                            <td id="created_at">Belum ditemukan.</td>
                                        </tr>
                                        <tr>
                                            <td>Status Kehadiran</td>
                                            <td>
                                            <span class="badge badge-glow bg-success" id="presence">Belum Ditemukan.</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
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

@section('page-js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>

function SwalTime(title = 'Default', text = '', type = 'success') {
    let timerInterval
        Swal.fire({
        icon: type,
        title: title,
        text: text,
        timer: 5000,
        showConfirmButton: false,
        timerProgressBar: true,
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
    })
}

function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  //console.log(`Code matched = ${decodedText}`, decodedResult);
  $('#qrcode').val(decodedText);
  let id = decodedText;
  let partner_id = {{ Auth::user()->id }};
  if (id) {
        $.ajax({
            url : "{{ route('partner.qrcode.valid') }}",
            type : 'POST',
            data : {
                '_method' : 'POST',
                '_token' : "{{ csrf_token() }}",
                'partner_id' : partner_id,
                'qr_code' : id
            },
            success: function(response) {
                $("#name #created_at").text("Belum ditemukan");
                let message = response.message;
                if (response.status) {
                    $("#dataDitemukan").removeClass("d-none");
                    $("#dataTidakAda").addClass("d-none");
                    SwalTime('Sukses!', 'Anda Berhasil Melakukan Kehadiran!');
                    // clear all response from front
                    // Show to front
                    $("#name").text(response.data.data.user.name);
                    $("#event").text(response.data.data.event.title);
                    $("#invoice").text(response.data.data.invoice);
                    $("#created_at").text(response.data.register);
                    if (response.data.data.presence == 'present') {
                        $("#presence").text("Hadir");
                    } else {
                        $("#presence").text("Belum Hadir");
                    }
                } else {
                    SwalTime('Gagal!', message, 'error');
                    $("#dataTidakAda").removeClass("d-none");
                    $("#dataDitemukan").addClass("d-none");
                }
            },
            error: function(xhr){
                $("#dataTidakAda").removeClass("d-none");
                $("#dataDitemukan").addClass("d-none");
                Swal.fire({
                    type : 'error',
                    title : 'Oppss...',
                    text : 'Ada yang salah'
                })
            }
        })
    }
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  // console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection
