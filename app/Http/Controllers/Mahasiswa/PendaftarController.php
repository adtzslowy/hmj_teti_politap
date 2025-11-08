<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        $pendaftaran = $mahasiswa->pendaftaranAnggota()
                ->with(['divisiDipilih', 'divisiDitempatkan'])
                ->latest()
                ->get();
        $sudahDaftar = $mahasiswa->pendaftaranAnggota()->exists();
        $pendaftaranDibuka = Divisi::where('is_open', true)->exists();
        return view('mahasiswa.pendaftaran.index', compact('pendaftaran', 'sudahDaftar', 'pendaftaranDibuka'));
    }

    public function create()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $sudahDaftar = $mahasiswa->pendaftaranAnggota()->exists();
        $divisi = Divisi::where('is_open', true)->get();

        if ($divisi->isEmpty()) {
            return redirect('mahasiswa/pendaftaran-anggota')
                ->with('error', 'Pendaftaran belum dibuka oleh Admin');
        }

        if ($sudahDaftar) {
            return redirect('mahasiswa/pendaftaran-anggota')
                ->with('error', 'Anda sudah daftar sebelumnya');
        }

        return view('mahasiswa.pendaftaran.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "alasan_bergabung" => 'required|string|',
            'divisi_dipilih_id' => 'required|exists:divisi,id'
        ]);

        $mahasiswa = Auth::guard('mahasiswa')->user();

        if ($mahasiswa->pendaftaranAnggota()->exists()) {
            return redirect('mahasiswa/pendaftaran-anggota')
                ->with('error', 'Kamu sudah pernah mendaftar. Pendaftaran hanya bisa dilakukan sekali.');
        }

        $mahasiswa->pendaftaranAnggota()->create([
            'divisi_dipilih_id' => $request->divisi_dipilih_id,
            'status_pendaftaran' => 'Pending',
            'alasan_bergabung' => $request->alasan_bergabung,
        ]);

        return redirect('mahasiswa/pendaftaran-anggota')->with('success', 'Formulir pendaftaran berhasil di buat');
    }
}
