<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginAdmin()
    {
        return view("auth.admin.login");
    }
    public function loginMahasiswa()
    {
        return view("auth.mahasiswa.login");
    }

    public function loginProsesAdmin(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('admin')->with('success', 'Berhasil masuk sebagai admin');
        }

        return redirect('auth/login/admin')->with('error', 'Credential tidak valid, cek email dan password anda');
    }

    public function loginProsesMahasiswa(Request $request)
    {
        if (auth()->guard('mahasiswa')->attempt(['nim' => request('nim'), 'password' => request('password')])) {
            return redirect('mahasiswa')->with('success','Berhasil masuk sebagai mahasiswa');
        }

        return redirect('auth/login/mahasiswa')->with('error', 'Credential tidak valid, Cek username dan password anda');
    }

    public function logout()
    {
        $guards = [
            'admin',
            'mahasiswa'
        ];

        foreach ($guards as $guard)
        {
            auth()->guard($guard)->logout();
        }

        return redirect('/');
    }

    public function addAdmin(Request $request)
    {
        $user = new Admin;
        $user->id = "244efd2d-f156-41a4-a417-efb2318bd3bc";
        $user->name = "Deswita Mutia Putri";
        $user->email = "deswita@gmail.com";
        $user->password = bcrypt("d476ead1");
        $user->nim = "3042023019";
        $user->role = "Admin";
        $user->foto_profil = "Profil aja";
        $user->save();

        return "ADMIN BERAHSIL DI BUAT LAIN KALI JANGAN DILUPAKKAN PASSWORDNYE";
    }

}
