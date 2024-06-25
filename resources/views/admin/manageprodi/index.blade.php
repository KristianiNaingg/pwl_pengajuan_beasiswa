@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Prodi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a class="nav-link" href="#">
                                {{ Auth::user()->name }}/Manage Prodi
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
                                    
                                    <a href="{{ route('user-prodi-create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Prodi
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                        
                        <table class="table table-striped table-bordered" id="table-prodi" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Fakultas</th>
                                <th>Nama Kaprodi</th>
                                <th>Username</th>
                                <th>Nama Program Studi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prodi as $prodis)
                                <tr>
                                    <td>{{ $prodis->id_prodi }}</td>
                                    <td>{{$prodis->fakultas? $prodis->fakultas->nama_fakultas: 'N/A' }}
                                    </td>
                                   
                                    <td>{{$prodis->dosen? $prodis->dosen->nama_dosen: 'N/A' }}</td>
                                    <td>{{ $prodis->dosen && $prodis->dosen->user? $prodis->dosen->user->name: 'N/A'  }}
                                    </td>
                                    <td>{{ $prodis->nama_prodi }}</td>
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
