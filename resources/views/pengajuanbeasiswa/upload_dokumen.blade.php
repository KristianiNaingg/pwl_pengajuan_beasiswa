@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Upload Dokumen Beasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Beasiswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">

                        <!-- untuk menampilkan errornya saja -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('',$errors->all(':message')) }}
                            </div>
                        @endif

                        <!-- kita ubah email address dan password dengan no dan nama_kepala_keluarga -->
                        <form method="post" action="{{ route('pb-upload-dokumen') }}" enctype="multipart/form-data">
                            @csrf <!-- @crsf wajib ada di setiap form -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="mb-3" style="display: inline-block; width: 30%;">
                                    <label>Nama Beasiswa yang dipilih:</label>
                                    <p>{{ session('selected_beasiswa')->nama_beasiswa }}</p>
                                </div>
                                    <div class="mb-3" style="display: inline-block; width: 30%;">
                                    <label>*Unggah File Transkrip Nilai</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="transkrip_nilai" id="nilai" required>
                                    </div>
                                </div>
                                    <div class="mb-3">
                                    <label>*Unggah File Surat Rekomendasi</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="rekomendasi" id="rekomendasi" required>
                                    </div>
                                </div>
                                    <div class="mb-3" style="display: inline-block; width: 30%;">
                                    <label>*Unggah File Surat Pernyataan</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="pernyataan" id="pernyataan" required>
                                    </div>
                                </div>
                                    <div class="mb-3" style="display: inline-block; width: 30%;">
                                    <label>*Unggah File Surat Keaktifan Mahasiswa</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="keaktifan" id="keaktifan" required>
                                    </div>
                                </div>
                                    <div class="mb-3" style="display: inline-block;">
                                    <label>*Unggah File Surat Keterangan Tidak Mampu (SKTM)</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="keterangan" id="keterangan" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <style>
    .mb-3 {
        margin-bottom: 30px;
    }
    label {
        font-weight: bold;
    }
    </style>
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-pb').DataTable();
    </script>
@endsection
