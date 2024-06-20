<?php

namespace App\Http\Controllers;

use App\Models\JenisBeasiswa;
use App\Models\KartuKeluarga;
use App\Models\PengajuanBeasiswa;
use Illuminate\Http\Request;

class PengajuanBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuanbeasiswa.index', [
            'pbs' => PengajuanBeasiswa::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengajuan()
    {
        return view('pengajuanbeasiswa.pilihjenisbeasiswa', [
            'jenis_beasiswas' => JenisBeasiswa::all(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_beasiswa' => 'required|array|size:1',
            'jenis_beasiswa.*' => 'exists:jenis_beasiswa,id_jenis_beasiswa',
        ]);
    
        $selectedBeasiswaId = $request->input('jenis_beasiswa')[0];
        $selectedBeasiswa = JenisBeasiswa::find($selectedBeasiswaId);
        session(['selected_beasiswa' => $selectedBeasiswa]);

        // Redirect ke halaman registrasi beasiswa
        return redirect()->route('registrasi-beasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDokumen(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required|exists:beasiswa,id_beasiswa',
        ]);

        /// Get the selected beasiswa details
        $selectedBeasiswaId = $request->input('nama_beasiswa');
        $selectedBeasiswa = NamaBeasiswa::find($selectedBeasiswaId);

        // Store the selected beasiswa in the session
        session(['selected_beasiswa' => $selectedBeasiswa]);

        // Redirect to the document upload page
        return redirect()->route('pb-upload-dokumen');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUploadDokumenForm()
    {
        return view('pengajuanbeasiswa.upload_dokumen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function storeuploadBeasiswa(Request $request)
    {
        $validatedData = validator($request->all(),[ 
            'transkrip_nilai' => 'required|mimes:jpeg,png,pdf|max:2048',
            'surat_rekomendasi' => 'required|mimes:jpeg,png,pdf|max:2048',
            'surat_pernyataan' => 'required|mimes:jpeg,png,pdf|max:2048',
            'surat_keaktifan' => 'required|mimes:jpeg,png,pdf|max:2048',
            'surat_keterangan' => 'required|mimes:jpeg,png,pdf|max:2048',
        ], [ 
            'transkrip_nilai_required' => 'Dokumen Transkrip Nilai Wajib Diisi',
            'surat_rekomendasi_required' => 'Dokumen Surat Rekomendasi Wajib Diisi',
            'surat_pernyataan.required' => 'Dokumen Surat Pernyataan Wajib Diisi',
            'surat_keaktifan.required' => 'Dokumen Surat Keaktifan Wajib Diisi',
            'surat_keterangan.required' => 'Dokumen Surat Keterangan Wajib Diisi',
        ])->validate();

        // Store files
        $transkripNilai = $request->file('transkrip_nilai')->store('transkrip_nilai');
        $rekomendasi = $request->file('rekomendasi')->store('rekomendasi');
        $pernyataan = $request->file('pernyataan')->store('pernyataan');
        $keaktifan = $request->file('keaktifan')->store('keaktifan');
        $keterangan = $request->file('keterangan')->store('keterangan');

        return redirect()->route('pb-list')->with('success', 'Dokumen berhasil diunggah.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanBeasiswa $pengajuanBeasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanBeasiswa $pengajuanBeasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanBeasiswa $pengajuanBeasiswa)
    {
        //
    }
}
