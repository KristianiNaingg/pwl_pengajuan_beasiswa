<!-- resources/views/timeline_beasiswa/create.blade.php -->
@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Timeline Beasiswa</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Timeline Beasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('prodi_store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="id_periode" class="col-sm-2 col-form-label">No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_periode" placeholder="Id Periode" name="id" required autofocus maxlength="16" value="{{ $nextId }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_periode" class="col-sm-2 col-form-label">Nama Polling </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_periode" placeholder="Contoh: Polling 1" required name="timeline" maxlength="100">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Buka</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="tgl_mulai" placeholder="Pilih Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_selesai" class="col-sm-2 col-form-label">Tanggal Tutup</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="tgl_selesai" placeholder="Pilih Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->


                            <button type="submit" class="btn btn-primary">Simpan</button>


                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection

@section('ExtraJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
