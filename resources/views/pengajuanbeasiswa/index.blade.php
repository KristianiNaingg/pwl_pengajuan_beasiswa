@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengajuan Beasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Beasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="card-footer">
            <div class="container-fluid">
                <div class="card-body">
                    <a href="#" class="btn btn-success">Pengajuan Beasiswa</a>
                </div>
            </div>
        </div>



        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table id="table-pb" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NRP</th>
                                        <th>ID Jenis Beasiswa</th>
                                        <th>ID Periode</th>
                                        <th>IPK Terakhir</th>
                                        <th>Semester Pengajuan</th>
                                        <th>Status Pengajuan</th>
                                        <th>Alasan Ditolak</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pbs as $pb)
                                        <tr>
                                            <td>{{ $pb->id_pengajuan }}</td>
                                            <td>{{ $pb->NRP }}</td>
                                            <td>{{ $pb->id_jenis_beasiswa }}</td>
                                            <td>{{ $pb->id_periode }}</td>
                                            <td>{{ $pb->ipk_terakhir }}</td>
                                            <td>{{ $pb->semester_pengajuan }}</td>
                                            <td>{{ $pb->status_pengajuan }}</td>
                                            <td>{{ $pb->alasan_ditolak }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            @endsection

            @section('ExtraCSS')
                <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            @endsection

            @section('ExtraJS')
                <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script>
                    $('#table-pb').DataTable();
                </script>
@endsection
