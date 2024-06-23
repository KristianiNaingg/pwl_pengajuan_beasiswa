<!-- resources/views/beasiswa/index.blade.php -->
@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Beasiswa</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('prodi_create') }}" class="btn btn-primary">Tambah Beasiswa</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Id Periode</th>
                                    <th>Nama Periode</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($timeline as $timelines)
                                    <tr>
                                        <td>{{ $timelines->id_periode }}</td>
                                        <td>{{ $timelines->nama_periode }}</td>
                                        <td>{{ $timelines->tanggal_mulai}}</td>
                                        <td>{{ $timelines->tanggal_selesai }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
