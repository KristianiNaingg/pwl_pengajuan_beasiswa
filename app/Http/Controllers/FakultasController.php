<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\PengajuanBeasiswa;
use Illuminate\Http\Request;
use App\Models\Fakultas;
class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }
    public function dosen()
    {
        $dosen = Dosen::all();
        return view('fakultas.dosen', compact('dosen'));
    }


    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_prodi' => 'required|string|max:255',
            'id_fakultas' => 'required|integer',
            'id_dosen' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Prodi::create($request->all());

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }


// app/Http/Controllers/PengajuanController.php


    public function approve($id)
    {
        try {
            $pengajuan =PengajuanBeasiswa ::find($id);
            if (!$pengajuan) {
                return response()->json(['success' => false, 'message' => 'Pengajuan tidak ditemukan.']);
            }
            $pengajuan->status_pengajuan = 'Diterima Oleh Fakultas';
            $pengajuan->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function reject($id)
    {
        try {
            $pengajuan = PengajuanBeasiswa::find($id);
            if (!$pengajuan) {
                return response()->json(['success' => false, 'message' => 'Pengajuan tidak ditemukan.']);
            }
            $pengajuan->status_pengajuan = 'Ditolak Oleh Fakultas';
            $pengajuan->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }






}
