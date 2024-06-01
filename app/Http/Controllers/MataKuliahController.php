<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Detail;
use App\Models\User;

use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matakuliah.index', [
            'mks' => MataKuliah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function polling()
    {
        return view('matakuliah.polling',[
            'pollings' => MataKuliah::all(),
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
        $validatedData = validator($request->all())->validate();
        $matakuliah = new MataKuliah($validatedData);
        $matakuliah->save();
        return redirect(route('matkul-list')); #ketika kita submit, kembali ke mk-list untuk menampilkan datanya
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        //
    }
    public function storeSelectedCourses(Request $request)
{
    $selectedCourses = $request->input('mk');

    foreach ($selectedCourses as $courseCode) {
        // Assuming you have a 'polling_details' table to store the selected courses
        PollingDetail::create([
            'course_code' => $courseCode,
            // You may need to associate the course with the user who submitted the form
            'user_id' => auth()->id(), // Assuming you're using Laravel's authentication
        ]);
    }

    // Optionally, you can redirect the user to a different page after saving the data
    return redirect()->back()->with('success', 'Selected courses saved successfully!');
}
    

}
