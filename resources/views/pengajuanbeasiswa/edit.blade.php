@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pengajuan Beasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Beasiswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <form action="{{ route('pb-update', $pb->id_pengajuan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status_pengajuan">Status Pengajuan</label>
                                <input type="text" name="status_pengajuan" class="form-control" value="{{ $pb->status_pengajuan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="semester_pengajuan">Semester Pengajuan</label>
                                <input type="text" name="semester_pengajuan" class="form-control" value="{{ $pb->semester_pengajuan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="transkrip_nilai">Transkrip Nilai</label>
                                <input type="file" name="transkrip_nilai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rekomendasi">Surat Rekomendasi</label>
                                <input type="file" name="rekomendasi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pernyataan">Surat Pernyataan</label>
                                <input type="file" name="pernyataan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keaktifan">Surat Keaktifan</label>
                                <input type="file" name="keaktifan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Surat Keterangan</label>
                                <input type="file" name="keterangan" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
