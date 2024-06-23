@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Program Studi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Program Studi</li>
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
                                    <td>{{ $pengajuans->status_pengajuan }}</td>
                                    <td>{{ $pengajuans->alasan_ditolak }}</td>
                                    <td><button class="btn btn-success approve-btn">Approve</button></td>
                                </tr>
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
                var idPengajuan = row.find('td').eq(0).text();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "'Apakah Anda yakin ingin menyetujui pengajuan ini?'",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, setujui!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Tambahkan logika persetujuan Anda di sini
                        Swal.fire(
                            'Disetujui!',
                            'Pengajuan dengan ID Pengajuan ' + idPengajuan + ' telah disetujui.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
