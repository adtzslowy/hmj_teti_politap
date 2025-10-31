<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function profil()
    {
        $mahasiswa = auth()->guard('mahasiswa')->user();
        return view('mahasiswa.profil.index', compact('mahasiswa'));
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.profil.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'foto_profil' => 'nullable|mimes:jpg,jpeg,png,webp,gif',
        ]);

        $data = $request->except(['_token', 'foto_profil']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('foto_profil')) {
            if ($mahasiswa->foto_profil && Storage::disk('public')->exists($mahasiswa->foto_profil)) {
                Storage::disk('public')->delete($mahasiswa->foto_profil);
            }

            $data['foto_profil'] = $mahasiswa->profilePath($request);
        }

        $mahasiswa->update($data);
        return redirect('mahasiswa/profile')->with('success', 'Informasi mahasiswa berhasil diperbaharui');
    }
}
