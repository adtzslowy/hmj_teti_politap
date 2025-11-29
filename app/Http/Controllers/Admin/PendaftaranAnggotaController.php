<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranAnggotaController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        $search = request()->query('search');

        $pendaftar = Pendaftaran::with(['mahasiswa', 'divisiDipilih', 'divisiDitempatkan'])
            ->when($admin->role !== 'God', function ($q) use ($admin) {
                $q->whereHas('mahasiswa', function ($mhs) use ($admin) {
                    $mhs->where('prodi_id', $admin->program_studi_id);
                });
            })
            ->when($search, function ($q) use ($search) {
                $q->whereHas('mahasiswa', function ($mhs) use ($search) {
                    $mhs->where('nama_mahasiswa', 'like', "%$search%")
                        ->orWhere('nim', 'like', "%$search%");
                });
            })
            ->get();

        $divisi = Divisi::all();
        return view('admin.pendaftaran.index', compact('pendaftar', 'divisi'));
    }


    public function approved(Request $request, string $id)
    {
        $request->validate([
            'divisi_ditempatkan_id' => 'required|exists:divisi,id'
        ]);

        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->update([
            'status_pendaftaran' => 'Approved',
            'alasan_ditolak' => null,
            'divisi_ditempatkan_id' => $request->divisi_ditempatkan_id
        ]);

        return redirect()->back()->with('success', 'Pendaftar berhasil diterima');
    }

    public function decline(Request $request, $id)
    {
        $request->validate([
            'alasan_ditolak' => 'required|string'
        ]);

        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->update([
            'status_pendaftaran' => 'Decline',
            'alasan_ditolak' => $request->alasan_ditolak,
            'divisi_ditempatkan_id' => null,
        ]);

        return redirect()->back()->with('success', 'Pendaftar berhasil ditolak');
    }

    public function destroy(string $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        $pendaftar->delete();

        return redirect()->back()->with('success', 'Berhasil hapus data');
    }
}
