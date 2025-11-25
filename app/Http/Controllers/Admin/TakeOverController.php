<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TakeOverController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('nim', 'ASC')->when(request('search'), function($q) {
            $search = request('search');
            $q->where('nama_mahasiswa', 'like', "%$search%")
                ->orWhere("nim","like", "%$search%");
        })->paginate(10);

        return view('admin.impersonate.index', compact('mahasiswa'));
    }

    public function impersonate(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $target = Mahasiswa::findOrFail($id);

        if ($admin->canImpersonate()) {
            $admin->impersonate($target, 'mahasiswa');
        }

        return redirect('/mahasiswa')->with('success', 'Berhasil Take Over Akun Mahasiswa');
    }

    public function leave()
    {
        auth()->user()->leaveImpersonation();
        return redirect('/admin/impersonate')->with('success', 'Berhasil keluar dari Take Over');
    }
}
