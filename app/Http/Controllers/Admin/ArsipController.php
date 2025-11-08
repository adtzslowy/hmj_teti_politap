<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        $arsip = Arsip::when($search, function ($query) use ($search) {
                return $query->where('nama_dokumen', 'like', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.arsip.index', compact('arsip'));
    }

    public function create()
    {
        if (!Auth::guard('admin')->check()) {
            abort(403, 'Hanya admin yang dapat menambahkan arsip.');
        }
        return view('admin.arsip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $arsip = new Arsip();
        $arsip->id_admin = Auth::guard('admin')->id();
        $arsip->nama_dokumen = $request->nama_dokumen;
        $arsip->deskripsi = $request->deskripsi;

        $arsip->uploadFile($request);

        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diunggah.');
    }

    public function show($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('admin.arsip.show', compact('arsip'));
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);

        if (!Auth::guard('admin')->check() || $arsip->id_admin != Auth::guard('admin')->id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit arsip ini.');
        }

        return view('admin.arsip.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);

        if (!Auth::guard('admin')->check() || $arsip->id_admin != Auth::guard('admin')->id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit arsip ini.');
        }

        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ]);

        $arsip->nama_dokumen = $request->nama_dokumen;
        $arsip->deskripsi = $request->deskripsi;
        $arsip->replaceFile($request);
        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);

        if (!Auth::guard('admin')->check() || $arsip->id_admin != Auth::guard('admin')->id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus arsip ini.');
        }

        if ($arsip->file && Storage::disk('public')->exists('arsip/' . $arsip->file)) {
            Storage::disk('public')->delete('arsip/' . $arsip->file);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }
}
