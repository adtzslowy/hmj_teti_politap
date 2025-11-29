<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::orderBy('nama_prodi')->get();
        return view('admin.prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'kaprodi' => 'required|string',
        ]);

        $prodi = New Prodi();
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->kaprodi = $request->kaprodi;
        $prodi->save();

        return redirect('admin/prodi')->with('success', 'Program Studi berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('admin.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);
        $request->validate([
            'nama_prodi' => 'required',
            'kaprodi' => 'required|string'
        ]);

        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->kaprodi = $request->kaprodi;
        $prodi->save();

        return redirect('admin/prodi')->with('success', 'Berhasil memperbaharui data prodi');
    }
}
