<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        $rolesCount = Role::count();
        $roleMahasiswaCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'mahasiswa');
        })->count();

        return view('admin.index', compact('users', 'rolesCount', 'roleMahasiswaCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.createuser', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|string|exists:role,role_name' // Validation for role selection
        ]);

        // Temukan peran berdasarkan namanya
        $role = Role::where('role_name', $validatedData['role'])->first();

        // Buat peng baru
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role()->associate($role); // Mengasosiasikan peran dengan pengguna baru
        $user->save();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('user-list')->with('success', 'User created successfully.');
    }

    public function showrole()
    {
        $roles = Role::all();
        return view('admin.showrole',compact('roles'));
    }

    public function showmahasiswa()
    {
        $roles = Role::all();
        return view('admin.showrole',compact('roles'));
    }
    public function showmafacultas()
    {
        $roles = Role::all();
        return view('admin.showrole',compact('roles'));
    }

    public function showprodi()
    {
        $roles = Role::all();
        return view('admin.showrole',compact('roles'));
    }

    public function showbeasiswa()
    {
        $roles = Role::all();
        return view('admin.showbeasiswa',compact('roles'));
    }
}
