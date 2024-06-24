<?php

namespace App\Http\Controllers;

use App\Models\JenisBeasiswa;
use App\Models\NamaBeasiswa;
use App\Models\PengajuanBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();

        $mahasiswa = \App\Models\Mahasiswa::where('email', $user->email)->first();
        
        return view('pengajuanbeasiswa.pilihjenisbeasiswa', [
            'mahasiswa' => $mahasiswa,
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

        // Menyimpan jenis beasiswa yang dipilih ke dalam sesi
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
        return redirect()->route('pb-upload-transkrip_nilai');
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
        {

            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'You must be logged in to submit documents.');
            }

            $user = auth()->user();
            \Log::info('Authenticated user: ' . json_encode($user));

            if (!$user->nrp) {
                return redirect()->back()->with('error', 'Authenticated user does not have an NRP.');
            }

            // Validation
            $request->validate([
                'transkrip_nilai' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
                'rekomendasi' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
                'pernyataan' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
                'keaktifan' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
                'keterangan' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // Store files and get their paths
            $transkrip_nilai = $request->file('transkrip_nilai')->store('dokumen', 'public');
            $rekomendasi = $request->file('rekomendasi')->store('dokumen', 'public');
            $pernyataan = $request->file('pernyataan')->store('dokumen', 'public');
            $keaktifan = $request->file('keaktifan')->store('dokumen', 'public');
            $keterangan = $request->file('keterangan')->store('dokumen', 'public');

            // Save paths to the database
            $pengajuanBeasiswa = new PengajuanBeasiswa();
            $pengajuanBeasiswa->NRP = auth()->user()->nrp;
            $pengajuanBeasiswa->status_pengajuan = 'Pending';
            $pengajuanBeasiswa->semester_pengajuan = '2024';
            $pengajuanBeasiswa->transkrip_nilai = $transkrip_nilai;
            $pengajuanBeasiswa->surat_rekomendasi = $rekomendasi;
            $pengajuanBeasiswa->surat_pernyataan = $pernyataan;
            $pengajuanBeasiswa->surat_keaktifan = $keaktifan;
            $pengajuanBeasiswa->surat_keterangan = $keterangan;
            $pengajuanBeasiswa->save();

            // Redirect to the index page
            return redirect()->route('pb-list')->with('success', 'Documents uploaded successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengajuan)
    {
        $pb = PengajuanBeasiswa::findOrFail($id_pengajuan);
        return view('pengajuanbeasiswa.edit', compact('pb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengajuan)
    {
        $request->validate([
            'transkrip_nilai' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'rekomendasi' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'pernyataan' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'keaktifan' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $pb = PengajuanBeasiswa::findOrFail($id_pengajuan);

        if ($request->hasFile('transkrip_nilai')) {
            $pb->transkrip_nilai = $request->file('transkrip_nilai')->store('dokumen', 'public');
        }
        if ($request->hasFile('rekomendasi')) {
            $pb->surat_rekomendasi = $request->file('rekomendasi')->store('dokumen', 'public');
        }
        if ($request->hasFile('pernyataan')) {
            $pb->surat_pernyataan = $request->file('pernyataan')->store('dokumen', 'public');
        }
        if ($request->hasFile('keaktifan')) {
            $pb->surat_keaktifan = $request->file('keaktifan')->store('dokumen', 'public');
        }
        if ($request->hasFile('keterangan')) {
            $pb->surat_keterangan = $request->file('keterangan')->store('dokumen', 'public');
        }

        $pb->status_pengajuan = $request->input('status_pengajuan');
        $pb->semester_pengajuan = $request->input('semester_pengajuan');
        $pb->save();

        return redirect()->route('pb-list')->with('success', 'Pengajuan Beasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengajuan)
    {
        $pb = PengajuanBeasiswa::findOrFail($id_pengajuan);
        $pb->delete();

        return redirect()->route('pb-list')->with('success', 'Pengajuan Beasiswa deleted successfully.');
    }
