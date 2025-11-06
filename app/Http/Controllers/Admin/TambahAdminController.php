<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TambahAdminController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        $admin = Admin::orderBy('name', 'asc')->when($search, function ($query) use ($search) {
            return $query->where('name','like','%'. $search .'%');
        })->paginate(10);
        return view('admin.akses.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.akses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'nim' => 'required|string',
            'password' => 'required|string|min:8',
            'role' => 'required|in:GOD,Operator',
            'foto_profil' => 'nullable|mimes:jpg,jpeg,png,webp,gif'
        ]);

        $data = $request->except(['_token']);
        $data['password'] = bcrypt($data['password']);

        $admin = new Admin();
        $path = $admin->photoPath($request);
        if ($path) {
            $admin['foto_profil'] = $path;
        } else {
            $data['foto_profil'] = 'default.jpg';
        }

        Admin::create($data);

        return redirect('admin/tambah-admin')->with('success', 'Admin berhasil dibuat');
    }

    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.akses.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
            'password' => 'nullable|string|min:8',
            'email' => 'required|string',
            'role' => 'required|in:GOD,Operator',
            'foto_profil' => 'nullable|string|mimes:png,jpg,jpeg,webp,gif'
        ]);

        $data = $request->except(['_token', 'foto_profil']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('foto_profil')) {
            if ($admin->foto_profil && Storage::disk('public')->exists($admin->foto_profil)) {
                Storage::disk('public')->delete($admin->foto_profil);
            }

            $data['foto_profil'] = $admin->photoPath($request);
        }

        $admin->update($data);

        return redirect('admin/tambah-admin')->with('success', 'Admin berhasil diperbaharui');

    }

    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->foto_profil && Storage::disk('public')->exists($admin->foto_profil)) {
            Storage::disk('public')->delete($admin->foto_profil);
        }

        $admin->delete();
        return redirect()->back()->with('success', 'Admin berhasil dihapus dari Peradaban');
    }

}
