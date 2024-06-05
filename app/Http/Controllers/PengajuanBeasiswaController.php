<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanBeasiswa  $pengajuanBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanBeasiswa $pengajuanBeasiswa)
    {
        //
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
