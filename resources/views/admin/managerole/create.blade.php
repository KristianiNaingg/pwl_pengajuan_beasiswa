@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Tambah Data Role</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('user-rolelist') }}" class="btn">
                                    <i class="fas fa-arrow-left text-purple"></i>
                                </a>
                               
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <form method="POST" action="{{ route('user-role-store') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="role_id" class="col-sm-3 col-form-label">ID Role</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id" value="{{ old('role_id') }}" placeholder="ID Role" autofocus>
                                                @error('role_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="role_name" class="col-sm-3 col-form-label">Nama Role</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" id="role_name" value="{{ old('role_name') }}" placeholder="Nama Role">
                                                @error('role_name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row d-flex justify-content-end">
                                            <div class="col-sm-9">
                                                <a class="btn btn-default" href="{{ route('user-rolelist') }}">Batal</a>
                                                <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('ExtraJS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-matkul').DataTable();
        });
    </script>
@endsection
