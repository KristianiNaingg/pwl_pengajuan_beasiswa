<?php

namespace App\Http\Controllers;

use App\Models\TimelineBeasiswa;
use Illuminate\Http\Request;

class TimelineBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timelines = \App\Models\TimelineBeasiswa::all();

        $mahasiswas = \App\Models\Mahasiswa::all();

        return view('registrasi', compact('timelines', 'mahasiswas'));
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
     * @param  \App\Models\TimelineBeasiswa  $timelineBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(TimelineBeasiswa $timelineBeasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimelineBeasiswa  $timelineBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(TimelineBeasiswa $timelineBeasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimelineBeasiswa  $timelineBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimelineBeasiswa $timelineBeasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimelineBeasiswa  $timelineBeasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimelineBeasiswa $timelineBeasiswa)
    {
        //
    }
}
