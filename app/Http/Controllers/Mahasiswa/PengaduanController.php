<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth()->guard('mahasiswa')->user();

        $pengaduan = $mahasiswa->aduanMahasiswa()
                    ->latest()
                    ->paginate(10);

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
            'deskripsi' => 'required|string',
            'bukti_aduan' => 'required|image|mimes:png,jpg,jpeg,webp,gif'
        ]);

        $mahasiswa = Auth::guard('mahasiswa')->user();

        $mahasiswa->aduanMahasiswa()->create([
            'judul_pengaduan' => $request->judul_pengaduan,
            'deskripsi' => $request->deskripsi,
            'status' => 'Pending',
            'bukti_aduan' => $request->bukti_aduan,
        ]);

        return redirect('mahasiswa/pengaduan-anggota')->with('success', 'Pengaduan berhasil dikirim');
    }
}
