<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Mahasiswa;
use App\Models\PengajuanBeasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $prodi = Prodi::all();
        return view('user_prodi.index', compact('prodi'));
    }

    public function pengajuan()
    {
        $pengajuan = PengajuanBeasiswa::all();
        return view('user_prodi.pengajuanbeasiswa', compact('pengajuan'));
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
            $pengajuan->status_pengajuan = 'aktif';
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
            $pengajuan->status_pengajuan = 'ditolak';
            $pengajuan->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }




}
