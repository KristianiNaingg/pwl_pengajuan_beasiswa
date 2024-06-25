@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a class="nav-link" href="#">
                                {{ Auth::user()->name }}/Manage Mahasiswa
                            </a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="card p-4">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    
                                    <a href="{{ route('admin-mahasiswa-create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Mahasiswa
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table-kk" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NRP</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Email</th>
                                        <th>Status Aktif</th>
                                        <th>Angkatan</th>
                                        <th>Program Studi</th>
                                        <th>User Name</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mahasiswas as $mahasiswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mahasiswa->NRP?? 'N/A' }}</td>
                                            <td>{{ $mahasiswa->nama_lengkap }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->status_aktif}}</td>
                                            <td>{{ $mahasiswa->angkatan}}</td>
                                            <td>{{ $mahasiswa->prodi? $mahasiswa->prodi->nama_prodi: 'N/A'}}</td>
                                            <td>{{ $mahasiswa->user?  $mahasiswa->user->name: 'N/A' }}</td>
                                            <td class="text-right">
                                                <a href="" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> <!-- Ikon View -->
                                                </a>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> <!-- Ikon Edit -->
                                                </a>
                                                <form action="" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn" data-confirm="Are you sure you want to delete this user?">
                                                        <i class="fas fa-trash-alt"></i> <!-- Ikon Delete -->
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#table-kk').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function (event) {
                    const confirmationMessage = button.getAttribute('data-confirm');
                    if (!confirm(confirmationMessage)) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection
