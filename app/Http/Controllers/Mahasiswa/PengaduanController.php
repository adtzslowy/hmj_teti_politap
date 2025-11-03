<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())->latest()->get();
        return view('mahasiswa.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pengaduan' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul_pengaduan' => $request->judul_pengaduan,
            'isi_pengaduan' => $request->isi_pengaduan,
            'status' => 'Pending',
        ]);

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil dikirim!');
    }
}
