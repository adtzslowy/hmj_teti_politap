<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();

        $divisi = Divisi::where('prodi_id', $admin->program_studi_id)
                        ->orderBy('nama_divisi', 'ASC')
                        ->get();
        return view('admin.divisi.index', compact('divisi'));
    }

    public function create()
    {
        return view('admin.divisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|in:Ketua,Wakil Ketua,Koordinator,Sekertaris,Bendahara,Pengembangan Sumber Daya Mahasiswa,Akademik,Hubungan Masyarakat,Komunikasi dan Informasi,Komisi Kedisiplinan',
            'prodi_id' => 'required|exists:program_studi,id'
        ]);

        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->prodi_id = $request->prodi_id;
        $divisi->save();

        return redirect('admin/divisi')->with('success', "Divisi berhasil ditambahkan");
    }

    public function show(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('admin.divisi.show', compact('divisi', 'prodi'));
    }

    public function edit(Request $request, string $id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('admin.divisi.edit', compact('divisi'));
    }

    public function update(Request $request, string $id)
    {
        $divisi = Divisi::findOrFail($id);
        $request->validate([
            'nama_divisi' => 'required|in:Ketua,Koordinator,Sekertaris,Bendahara,Pengembangan Sumber Daya Manusia,Akademis,Hubungan Masyarakat,Komunikasi dan Informasi,Komisi Kedisiplinan',
            'prodi_id' => 'required|exists:program_studi,id'
        ]);

        $divisi->nama_divisi = request('nama_divisi');
        $divisi->save();

        return redirect('admin/divisi')->with('success','Divisi berhasil diperbaharui');

    }

    public function destroy(string $id)
    {
        $divisi = Divisi::findOrFail($id);

        $divisi->delete();
        return redirect('admin/divisi')->with('success', 'Divisi berhasil di hapus');
    }

    public function toggleStatus($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->is_open = !$divisi->is_open;
        $divisi->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbaharui');
    }
}
