<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.dashboard', compact('admin'));
    }

    public function profil()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.profile', compact('admin'));
    }

    public function edit()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name'=> 'required|string|max:2048',
            'nim'=> 'required|string|max:2048',
            'email'=> 'required|string|email',
            'password'=> 'nullable|string|min:8',
            'foto_profil'=> 'nullable|mimes:webp,jpg,jpeg,png|max:2048',
        ]);


        $data = $request->except(['_token', 'foto_profil']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
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
        return redirect('admin/profile')->with('success','Admin berhasil diperbaharui');
    }
}
