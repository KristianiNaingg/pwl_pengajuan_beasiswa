@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pilih Jenis Beasiswa</h1>
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

                        <form method="post" action="{{route('pb-registrasi')}}" onsubmit="doValidate(event)">
                            @csrf <!-- @crsf wajib ada di setiap form -->
                            <div class="form-group">
                                @foreach($jenis_beasiswas as $jenis_beasiswa)
                                        <label style="display: inline-block;">
                                            <input type="checkbox" name="jenis_beasiswa[]" value="{{ $jenis_beasiswa->id_jenis_beasiswa }}" onchange="selectOnlyOneCheckbox(this)">
                                            {{ $jenis_beasiswa->nama_jenis_beasiswa }}
                                        </label><br>
                                @endforeach
                                </select>
                                <br>
{{--                                <!-- Deskripsi Beasiswa Prestasi -->--}}
{{--                                <p><b>Deskripsi Beasiswa Prestasi:</b>--}}
{{--                                    Beasiswa yang diberikan oleh Universitas Kristen Maranatha ditujukan bagi mahasiswa aktif yang berprestasi atau berasal dari latar belakang keluarga berekonomi marginal, sesuai syarat dan ketentuan yang berlaku serta kemampuan unit pemberi beasiswa. Setiap mahasiswa atau mahasiswi hanya berhak menerima satu jenis bantuan, baik berupa beasiswa, potongan biaya, atau bantuan keuangan dari Universitas Kristen Maranatha, Yayasan Perguruan Tinggi Kristen Maranatha (YPTKM), atau lembaga eksternal. Ini termasuk potongan biaya dari Jalur Prestasi, Jalur Undangan, dan Jalur Reguler.--}}
{{--                                </p>--}}
{{--                                <!-- Deskripsi Beasiswa Bantuan Ekonomi -->--}}
{{--                                <p><b>Deskripsi Beasiswa Bantuan Ekonomi:</b>--}}
{{--                                    Beasiswa yang disediakan oleh Universitas Kristen Maranatha dengan memberikan bantuan keuangan yang diberikan kepada mahasiswa aktif Universitas Kristen Maranatha yang berprestasi atau berasal dari latar belakang keluarga dengan kondisi ekonomi yang terbatas. Mahasiswa hanya dapat menerima satu jenis bantuan, baik itu berupa beasiswa, potongan biaya, atau bantuan keuangan lainnya, sesuai dengan kebijakan dan kemampuan penyedia beasiswa.--}}
{{--                                </p>--}}

                                <!-- name="nama_kepala" -> value "nama_kepala" harus sama dengan nama kolomnya -->
                                <button type="submit" class="btn btn-primary my-3">Next</button>
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
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('ExtraJS')
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <script src="{{asset('plugins/select2/js/select2.js')}}"></script>
    <script>
        $('#jenis_beasiswa').select2();
    </script>
@endsection

