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
                    <a href="{{ route('pb-beasiswa') }}" class="btn btn-success">Pengajuan Beasiswa</a>
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
                                        <th>NRP</th>
                                        <th>Status Pengajuan</th>
                                        <th>Semester Pengajuan</th>
                                        <th>Transkrip Nilai</th>
                                        <th>Surat Rekomendasi</th>
                                        <th>Surat Pernyataan</th>
                                        <th>Surat Keaktifan</th>
                                        <th>Surat Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pbs as $pb)
                                        <td>{{ $pb->NRP }}</td>
                                            <td>{{ $pb->status_pengajuan }}</td>
                                            <td>{{ $pb->semester_pengajuan }}</td>
                                            <td><img src="{{ asset('storage/' . $pb->transkrip_nilai) }}" alt="foto" class="img-thumbnail"
                                                 style="max-width: 80px"></td>
                                            <td><img src="{{ asset('storage/' . $pb->surat_rekomendasi) }}" alt="foto" class="img-thumbnail"
                                                 style="max-width: 80px"></td>
                                            <td><img src="{{ asset('storage/' . $pb->surat_pernyataan) }}" alt="foto" class="img-thumbnail"
                                                 style="max-width: 80px"></td>
                                            <td><img src="{{ asset('storage/' . $pb->surat_keaktifan) }}" alt="foto" class="img-thumbnail"
                                                 style="max-width: 80px"></td>
                                            <td><img src="{{ asset('storage/' . $pb->surat_keterangan) }}" alt="foto" class="img-thumbnail"
                                                 style="max-width: 80px"></td>
                                            <td>
                                                <a href="{{ route('pb-edit', $pb->id_pengajuan) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('pb-destroy', $pb->id_pengajuan) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-confirm="Apakah anda yakin ingin menghapus data ini?">Delete</button>
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
                <!-- /.content -->
            </div>
            @endsection

            @section('ExtraCSS')
                <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            @endsection

            @section('ExtraJS')
            <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const deleteButtons = document.querySelectorAll('.btn-sm');

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
                <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script>
                    $('#table-pb').DataTable();
                </script>
@endsection
