<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::with('mahasiswa')
                   ->latest()
                   ->paginate(10);
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function proses(Request $request, string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => 'Diproses',
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back()->with('success', 'Pengaduan sedang diproses');
    }

    public function selesai(Request $request, string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => 'Selesai',
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back()->with('success', 'Pengaduan telah selesai');
    }

}
