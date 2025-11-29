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
        $admin = auth()->guard('admin')->user();
        $search = request('search');

        $anggota = Anggota::query()
            ->with(['mahasiswa', 'divisi', 'prodi'])

            ->when($admin->role !== 'God', function ($q) use ($admin) {
                $q->where('prodi_id', $admin->program_studi_id);
            })

            ->when($search, function ($q) use ($search) {
                $q->whereHas('mahasiswa', function ($mhs) use ($search) {
                    $mhs->where('nama_mahasiswa', 'LIKE', "%{$search}%")
                        ->orWhere('nim', 'LIKE', "%{$search}%");
                });
            })

            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.anggota.index', compact('anggota'));
    }


    public function create()
    {
        $mahasiswa = Mahasiswa::orderBy('nim')->get();
        $divisi = Divisi::orderBy('nama_divisi')->get();
        return view('admin.anggota.create', compact('mahasiswa', 'divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id|unique:anggota,mahasiswa_id',
            'divisi_id' => 'required|exists:divisi,id',
            'prodi_id' => 'required|exists:program_studi,id'
        ]);

        Anggota::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'divisi_id' => $request->divisi_id,
            'prodi_id' => $request->prodi_id,
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
