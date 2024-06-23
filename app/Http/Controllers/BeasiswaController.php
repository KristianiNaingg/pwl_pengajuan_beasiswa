<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\JenisBeasiswa;
use App\Models\TimelineBeasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswa = Beasiswa::all();
        return view('beasiswa.index', compact('beasiswa'));
    }

    public function timeline()
    {
        $timeline = TimelineBeasiswa::all();
        return view('beasiswa.timeline', compact('timeline'));
    }
    public function jenisbeasiswa()
    {
        $jenis = JenisBeasiswa::all();
        return view('beasiswa.jenisbeasiswa', compact('jenis'));
    }



    public function create()

    {
        $lastId = TimelineBeasiswa::max('id_periode');
        // Menambah 1 untuk mendapatkan id berikutnya
        $nextId = $lastId + 1;
        $timeline = TimelineBeasiswa::all();
        return view('beasiswa.create', compact('timeline','nextId'));
    }

    public function store (Request $request)

    {

        $validatedData = $request->validate([
            'id_periode' => 'required|integer|max:11',
            'nama_periode' => 'required|max:100',
            'tgl_mulai' => 'required|date',
            'tgl_selesai ' => 'required|date',
            'status ' =>  'required|max:100',
        ]);
        // Simpan data Prodi ke dalam database
        $timeline = new TimelineBeasiswa();
        $timeline->id_periode = $validatedData['id_periode'];
        $timeline->nama_periode = $validatedData['nama_periode']; // Pastikan 'nama_polling' diisi dengan nilai yang valid
        $timeline->tgl_buka = $validatedData['tgl_mulai'];
        $timeline->tgl_tutup = $validatedData['tgl_selesai'];
        $timeline->status = $validatedData['status'];
        $timeline->save();

        // Redirect ke halaman lain atau kembali ke halaman sebelumnya
        return redirect()->route('prodi_timeline')->with('success', 'sukses full');


    }
}
