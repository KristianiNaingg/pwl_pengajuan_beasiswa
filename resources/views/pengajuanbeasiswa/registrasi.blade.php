@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pilih Jenis Beasiswa</h1>
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

                        <script>
                            function selectOnlyOneCheckbox(element) {
                                var checkboxes = document.getElementsByName('jenis_beasiswa[]');
                                checkboxes.forEach(function(currentCheckbox) {
                                    if (currentCheckbox !== element) currentCheckbox.checked = false;
                                });
                            }
                        </script>

                        <form method="post" action="{{ route('pb-upload-dokumen-beasiswa') }}" onsubmit="doValidate(event)">
                            @csrf
                            <div class="form-group">
                                @foreach($timelines as $timeline)
                                    <div class="timeline-box">
                                        <label value="{{ $timeline->id_periode }}">Pendaftaran ditutup pada {{ $timeline->tanggal_selesai }}</label>
                                    </div>
                                @endforeach
                                <div class="row">
                                    @foreach($mahasiswas as $mahasiswa)
                                        <div class="col-md-6">
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>NRP:</label>
                                                <p>{{ $mahasiswa->NRP }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Nama Lengkap:</label>
                                                <p>{{ $mahasiswa->nama_lengkap }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Tempat, Tanggal Lahir:</label>
                                                <p>{{ $mahasiswa->tempat_tgl_lahir }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Jenis Kelamin:</label>
                                                <p>{{ $mahasiswa->jenis_kelamin }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>No HP:</label>
                                                <p>{{ $mahasiswa->no_hp }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 48%;">
                                                <label>Email:</label>
                                                <p>{{ $mahasiswa->email }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 53%;">
                                                <label for="nama_beasiswa">Nama Beasiswa:</label>
                                                <select name="nama_beasiswa" id="nama_beasiswa" class="form-control">
                                                    @foreach($beasiswas as $beasiswa)
                                                        <option value="{{ $beasiswa->id_beasiswa }}">{{ $beasiswa->nama_beasiswa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>IPK:</label>
                                                <p>{{ $mahasiswa->ipk_terakhir }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Status:</label>
                                                <p>{{ $mahasiswa->status_aktif }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Angkatan:</label>
                                                <p>{{ $mahasiswa->angkatan }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>ID Prodi:</label>
                                                <p>{{ $mahasiswa->id_prodi }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Users ID:</label>
                                                <p>{{ $mahasiswa->users_id }}</p>
                                            </div>
                                            <div class="mb-3" style="display: inline-block; width: 45%;">
                                                <label>Jenis Beasiswa:</label>
                                                <p>{{ session('selected_beasiswa')->nama_jenis_beasiswa }}</p>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach

                                <button type="submit" class="btn btn-primary my-3">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style>
        .mb-3 {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .timeline-box {
            background-color: #ffcccb;
            padding: 10px;
            margin: 20px 0;
            text-align: center;
            border-radius: 5px;
        }
        .timeline-box label {
            margin: 0;
            font-weight: bold;
        }
    </style>
@endsection

@section('ExtraJS')
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#nama_beasiswa').select2();
        });
    </script>
@endsection
