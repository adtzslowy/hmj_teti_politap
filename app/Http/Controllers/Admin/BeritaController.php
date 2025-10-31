<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search');

        $berita = berita::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dokumentasi' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'tanggal_post' => 'required|date',
        ]);

        $data = $request->except(['_token', 'dokumentasi']);

        $berita = new berita();
        $path = $berita->fotoberita($request);
        if ($path) {
            $berita['dokumentasi'] = $path;
        }

        berita::create($data);

        return redirect('admin/berita')->with('success', 'berita berhasil di upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita['berita'] = berita::findOrFail($id);
        return view('admin.berita.show', $berita);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita['berita'] = berita::findOrFail($id);
        return view('admin.berita.edit', $berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'dokumentasi' => 'nullable|mimes:png,jpg,webp,gif',
        ]);

        $data = $request->except(['_token', 'dokumentasi']);

        if ($request->hasFile('dokumentasi')) {
            if ($berita->dokumentasi && Storage::disk('public')->exists($berita->dokumentasi)) {
                Storage::disk('public')->delete($berita->dokumentasi);
            }

            $data['dokumentasi'] = $berita->fotoberita($request);
        }

        $berita->update($data);

        return redirect('admin/berita')->with('success','berita berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->dokumentasi && Storage::disk('public')->exists($berita->dokumentasi)) {
            Storage::disk('public')->delete($berita->dokumentasi);
        }

        $berita->delete();

        return redirect('admin/berita')->with('success','Berita berhasil dihapus');
    }
}
