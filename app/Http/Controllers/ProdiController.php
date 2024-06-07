<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;


use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    public function index()
    {
        $matkuls = Matakuliah::with('kurikulum')->get();
        return view('prodi.index', compact('matkuls'));
    }

    public function create()

    {

    }

    public function store(Request $request)
    {




    }
    public function showbeasiswa()
    {
        return view('prodi.beasiswa');
    }





}
