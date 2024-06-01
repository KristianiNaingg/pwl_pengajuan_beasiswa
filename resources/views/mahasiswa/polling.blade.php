@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Polling Mata Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mata Kuliah</li>
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
                        <form method="post" action="{{route('mk-store')}}" onsubmit="doValidate(event)">
                            @csrf <!-- @crsf wajib ada di setiap form -->
                            <div class="form-group">
                                @foreach($pollings as $polling)
                                <div class="form-check">
                                    <label class="form-check-label" for="mk{{$loop->index}}">
                                    <input class="form-check-input" type="checkbox" value="{{$polling->kode_matkul}}" id="mk{{$loop->index}}" name="mk[]">
                                        {{$polling->nama_matkul}} - {{$polling->kode_matkul}} (SKS: {{$polling->sks}}, Kurikulum ID: {{$polling->kurikulum_id}})
                                    </label>
                                </div>
                                @endforeach

                                <!-- name="nama_kepala" -> value "nama_kepala" harus sama dengan nama kolomnya -->
                                <button type="submit" class="btn btn-primary my-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <script>
        function doValidate(event) {
            let totalSks = 0;
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            checkboxes.forEach((checkbox) => {
                totalSks += parseInt(checkbox.dataset.sks);
            });

            if(totalSks > 9) {
                event.preventDefault();
                alert("Total SKS melebihi batas yang diizinkan (9 SKS)!");
            }
        }
    </script>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('ExtraJS')
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <script src="{{asset('plugins/select2/js/select2.js')}}"></script>
    <script>
        $('#ctz-kk').select2();
    </script>
@endsection

