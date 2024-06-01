@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Mata Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('prodi-mkstore') }}">
                            @csrf <!-- @csrf wajib ada di setiap form -->
                            <div class="card-body">
                                {{--                                <div class="form-group row">--}}
                                {{--                                    <label for="id-matkul" class="col-sm-2 col-form-label">Nomor</label>--}}
                                {{--                                    <div class="col-sm-10">--}}
                                {{--                                        <input type="text" class="form-control" id="code-matkul" placeholder="Contoh: Polling 1" required name="id" maxlength="16">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="form-group row">
                                    <label for="id-matkul" class="col-sm-2 col-form-label">Nomor</label>
                                    <div class="col-sm-10">
                                        <!-- Tampilkan id berikutnya yang sudah dihitung di controller -->
                                        <input type="text" class="form-control" id="code-matkul" placeholder="Contoh: Polling 1" required name="id" maxlength="16">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="code-matkul" class="col-sm-2 col-form-label">Kode Matkul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="code-matkul" placeholder="Contoh: Polling 1" required name="kode_matkul" maxlength="16">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama-matkul" class="col-sm-2 col-form-label">Nama Matkul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama-matkul" placeholder="Contoh: Polling 1" required name="nama_matkul" maxlength="100">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sks" placeholder="Contoh: Polling 1" required name="sks" maxlength="16">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kurikulum_id">Kurikulum</label>
                                    <select name="kurikulum_id" id="kurikulum_id" class="form-control @error('kurikulum_id') is-invalid @enderror">
                                        <option value="">- Pilih kurikulum -</option>
                                        @foreach ($kurikulums as $kurikulum)
                                            <option value="{{ $kurikulum->kurikulum_id }}">{{ $kurikulum->tahun_akademik }}</option>
                                        @endforeach
                                    </select>
                                    @error('kurikulum_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
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
