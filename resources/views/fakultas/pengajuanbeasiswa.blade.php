@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Fakultas Teknologi dan Rekayasa Cerdas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Fakultas Teknologi dan Rekayasa Cerdas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table class="table table-striped" id="table-prodi">
                            <thead>
                            <tr>
                                <th>ID Pengajuan</th>
                                <th>ID Beasiswa</th>
                                <th>ID Periode</th>
                                <th>NRP</th>
                                <th>Surat Rekomendasi</th>
                                <th>Surat Pernyataan</th>
                                <th>Surat Keterangan</th>
                                <th>Semester Pengajuan</th>
                                <th>Status</th>
                                <th>Alasan Ditolak</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pengajuan as $pengajuans)
                                <tr>
                                    <td>{{ $pengajuans->id_pengajuan }}</td>
                                    <td>{{ $pengajuans->id_beasiswa }}</td>
                                    <td>{{ $pengajuans->id_periode }}</td>
                                    <td>{{ $pengajuans->NRP }}</td>
                                    <td>{{ $pengajuans->surat_rekomendasi }}</td>
                                    <td>{{ $pengajuans->surat_pernyataan }}</td>
                                    <td>{{ $pengajuans->surat_keterangan }}</td>
                                    <td>{{ $pengajuans->semester_pengajuan }}</td>
                                    <td class="status">{{ $pengajuans->status_pengajuan }}</td>
                                    <td>{{ $pengajuans->alasan_ditolak }}</td>
                                    <td>
                                        <button class="btn btn-success approve-btn" data-id="{{ $pengajuans->id_pengajuan }}">Approve</button>
                                        <button class="btn btn-danger reject-btn" data-id="{{ $pengajuans->id_pengajuan }}">Ditolak</button>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- Tambahkan SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Tambahkan SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#table-prodi').DataTable();

            $('.approve-btn').on('click', function() {
                var row = $(this).closest('tr');
                var idPengajuan = $(this).data('id');
                approvePengajuan(idPengajuan, 'approve', row);
            });

            $('.reject-btn').on('click', function() {
                var row = $(this).closest('tr');
                var idPengajuan = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Apakah Anda yakin ingin menolak pengajuan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, tolak!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/pengajuan/reject/' + idPengajuan,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                console.log('Response:', response);
                                if (response.success) {
                                    row.find('.status').text('Ditolak Oleh Fakultas');
                                    Swal.fire(
                                        'Ditolak!',
                                        'Pengajuan dengan ID Pengajuan ' + idPengajuan + ' telah ditolak.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Ajax Error:', xhr, status, error);
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menolak pengajuan.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            function approvePengajuan(idPengajuan, action, row) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Apakah Anda yakin ingin menyetujui pengajuan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, setujui!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/pengajuan/' + action + '/' + idPengajuan,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                console.log('Response:', response);
                                if (response.success) {
                                    row.find('.status').text('Diterima Oleh Fakultas');
                                    Swal.fire(
                                        'Disetujui!',
                                        'Pengajuan dengan ID Pengajuan ' + idPengajuan + ' telah disetujui.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Ajax Error:', xhr, status, error);
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menyetujui pengajuan.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            }
        });



    </script>
@endsection
