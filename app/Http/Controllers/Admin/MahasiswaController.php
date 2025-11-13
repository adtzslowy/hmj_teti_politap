<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        $mahasiswa = Mahasiswa::orderBy('nim','asc')->when($search, function ($query) use ($search) {
            return $query->where('nama_mahasiswa', 'like', "%{$search}%")
                            ->orWhere('nim', 'like', "%{$search}%");

        })->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:mahasiswa,nim',
            'status_mahasiswa' => 'required|in:Aktif,Tidak Aktif',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'foto_profil' => 'nullable|mimes:jpg,png,webp,jpeg|max:4096'
        ]);

        $data = $request->except(['_token', 'foto_profil']);

        $mahasiswa = new Mahasiswa();
        $path = $mahasiswa->profilePath($request);
        if ($path) {
            $mahasiswa['foto_profil'] = $path;
        } else {
            $data['foto_profil'] = 'default.jpg';
        }


        $data['password'] = bcrypt($request->nim);

        Mahasiswa::create($data);

        return redirect('admin/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'nullable|string|max:255',
            'status_mahasiswa' => 'required|in:Aktif,Tidak Aktif',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'foto_profil' => 'nullable|mimes:jpg,png,webp,jpeg|max:4096'
        ]);

        $data = $request->except(['_token', 'foto_profil']);

        if ($request->hasFile('foto_profil')) {
            if ($mahasiswa->foto_profil && Storage::disk('public')->exists($mahasiswa->foto_profil)) {
                Storage::disk('public')->delete($mahasiswa->foto_profil);
            }

            $data['foto_profil'] = $mahasiswa->profilePath($request);
        }

        if ($request->filled('nim') && $request->nim !== $mahasiswa->nim) {
            $data['password'] = bcrypt($request->nim);
        }

        $mahasiswa->update($data);

        return redirect('admin/mahasiswa')->with('success', 'Data Mahasiswa berhasil diperbaharui');
    }



    public function destroy(string $id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);

            if ($mahasiswa->foto_profil && Storage::disk('public')->exists($mahasiswa->foto_profil)) {
                Storage::disk('public')->delete($mahasiswa->foto_profil);
            }

            $mahasiswa->delete();

            return redirect('admin/mahasiswa')->with('success', 'Data Mahasiswa berhasil dihapus');
        } catch (Exception $e) {
            return redirect('admin/mahasiswa')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new MahasiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
