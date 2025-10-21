<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Divisi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with(['mahasiswa', 'divisi'])
                    ->orderBy('created_at','desc')
                    ->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $divisi = Divisi::all();
        return view('admin.anggota.create', compact('mahasiswa', 'divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id|unique:anggota,mahasiswa_id',
            'divisi_id' => 'required|exists:divisi,id',
        ]);

        Anggota::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'divisi_id' => $request->divisi_id,
        ]);

        return redirect('admin/anggota')->with('success', 'Anggota berhasil di buat');
    }

    public function show(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $divisi = divisi::all();

        return view('admin.anggota.show', compact('anggota', 'mahasiswa', 'divisi'));
    }

    public function edit(Request $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $divisi = divisi::all();

        return view('admin.anggota.edit', compact('anggota', 'mahasiswa', 'divisi'));
    }

    public function destroy(Request $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);

        $anggota->delete();

        return redirect()->back()->with('success', 'Anggota berhasil dihapus');
    }
}
