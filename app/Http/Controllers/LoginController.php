<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Auth;
//
//
//class LoginController extends Controller
//{
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//
//}


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
//    public function login(Request $request){
////        dd($request->all());
//        if(Auth::attempt($request->only('email','password'))){
//            return redirect('/starter');
//        }
//        return redirect('login');
//    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika autentikasi berhasil, dapatkan peran pengguna
            $user = Auth::user();
            $roleName = $user->roles->role; // Asumsikan relasi 'role' di model 'User'

            // Arahkan pengguna berdasarkan peran
            if ($roleName === 'admin') {
                return redirect('/admin');
            } elseif ($roleName === 'mahasiswa') {
                return redirect('/mahasiswa');
            }
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login
        return redirect('login');
    }

}
