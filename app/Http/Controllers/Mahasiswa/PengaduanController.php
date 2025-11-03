<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('mahasiswa.pengaduan.index');
    }

    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    public function store(Request $request)
    {
         //
    }
   

}