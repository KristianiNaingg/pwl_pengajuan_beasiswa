@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <diva class="col-sm-6">
                        <h1 class="m-0">Program Studi</h1>
                    </diva>
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
                                <th>ID Beasiswa</th>
                                <th>ID Jenis Beasiswa</th>
                                <th>ID Periode</th>
                                <th>Nama Beasiswa</th>
                                <th>  Aksi </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($beasiswa as $beasiswas)
                                <tr>
                                    <td>{{ $beasiswas->id_beasiswa}}</td>
                                    <td>{{ $beasiswas->id_jenis_beasiswa}}</td>
                                    <td>{{ $beasiswas->id_periode}}</td>
                                    <td>{{ $beasiswas->nama_beasiswa}}</td>
                                    <td><a href="{{ route('prodi_mahasiswa') }}"> Detail </a></td>

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
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-prodi').DataTable();
        });
    </script>
@endsection
