<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\LoginLogs;
use App\Models\Mahasiswa;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $chartRaw = LoginLogs::where('user_type', 'mahasiswa')
            ->whereDate('logged_in_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(logged_in_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $aduanChart = Pengaduan::whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $aduanLabels = $aduanChart->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m'));
        $aduanData   = $aduanChart->pluck('total');

        $labels = $chartRaw->pluck('date')->map(function ($d) {
            return \Carbon\Carbon::parse($d)->format('d/m');
        });
        $data = $chartRaw->pluck('total');

        $totalMahasiswa = Mahasiswa::count();
        $aduanMahasiswa = Pengaduan::count();

        $bulanIni = LoginLogs::where('user_type', 'mahasiswa')
                    ->whereMonth('logged_in_at', now()->month)
                    ->count();

        $recentActivity = LoginLogs::orderBy('logged_in_at', 'DESC')
                        ->take(5)
                        ->get();

        $recentAduan = Pengaduan::with('mahasiswa')
                ->orderBy('created_at', 'DESC')
                ->limit(10)
                ->get();

        $admin = auth()->guard('admin')->user();
        return view('admin.dashboard', compact('admin', 'chartRaw', 'totalMahasiswa', 'bulanIni', 'recentActivity', 'labels', 'data', 'aduanMahasiswa', 'aduanLabels', 'aduanData', 'recentAduan'));
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

    public function chart(Request $request)
    {
        $days = $request->days ?? 30;

        return response()->json([
            'labels' => [],
            'data' => [],
        ]);
    }
}
