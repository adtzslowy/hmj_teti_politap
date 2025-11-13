<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest('tanggal_post')->take(3)->get();
        $mahasiswa = Mahasiswa::count();
        $anggota = Anggota::count();
        $beritaPost = Berita::count();
        return view('welcome', compact('berita', 'mahasiswa', 'anggota', 'beritaPost'));
    }
}
