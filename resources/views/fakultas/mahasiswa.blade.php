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
                        <table class="table table-striped table-bordered" id="table-prodi" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id Prodi</th>
                                <th>Id User</th>
                                <th>Nama Lengkap</th>
                                <th>NRP</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Angkatan</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>IPK Terakhir</th>
                                <th>Status Aktif</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mahasiswa as $mahasiswas)
                                <tr>
                                    <td>{{ $mahasiswas->id_prodi }}</td>
                                    <td>{{ $mahasiswas->users_id }}</td>
                                    <td>{{ $mahasiswas->nama_lengkap }}</td>
                                    <td>{{ $mahasiswas->NRP }}</td>
                                    <td>{{ $mahasiswas->tempat_tgl_lahir }}</td>
                                    <td>{{ $mahasiswas->jenis_kelamin }}</td>
                                    <td>{{ $mahasiswas->angkatan }}</td>
                                    <td>{{ $mahasiswas->no_hp }}</td>
                                    <td>{{ $mahasiswas->email }}</td>
                                    <td>{{ $mahasiswas->ipk_terakhir }}</td>
                                    <td>{{ $mahasiswas->status_aktif }}</td>
                                    <td><a href="{{ route('beasiswa_pengajuan') }}" class="btn btn-info btn-sm">Detail</a></td>
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
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .content-wrapper {
            overflow-x: auto;
        }
        .card {
            width: 100%;
        }
        .table thead th {
            text-align: center;
        }
    </style>
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-prodi').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table-prodi_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
