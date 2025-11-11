<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Impersonate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TakeOverController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if (! $admin || $admin->role !== 'God') {
            abort(403, 'Akses ditolak');
        }

        $mahasiswa = Mahasiswa::orderBy('nama_mahasiswa')->paginate(15);

        return view('admin.impersonate.index', compact('mahasiswa'));
    }

    public function impersonate(Request $request, string $id)
    {
        $admin = Auth::guard('admin')->user();

        if (! $admin || $admin->role !== 'God') {
            abort(403, 'Akses ditolak');
        }

        if (Session::has('impersonator')) {
            return back()->with('error', 'Sudah dalam mode impersonasi');
        }

        $target = Mahasiswa::findOrFail($id);

        Session::put('impersonator', [
            'guard' => 'admin',
            'id'    => $admin->id,
        ]);

        $imp = Impersonate::create([
            'impersonator_guard' => 'admin',
            'impersonator_id'    => $admin->id,
            'target_guard'       => 'mahasiswa',
            'target_id'          => $target->id,
            'ip'                 => $request->ip(),
            'user_agent'         => $request->header('User-Agent'),
            'started_at'         => now(),
        ]);

        Session::put('impersonation_log_id', $imp->id);

        Auth::guard('mahasiswa')->loginUsingId($target->id);
        Auth::shouldUse('mahasiswa');
        $request->session()->regenerate();

        return redirect('/mahasiswa')->with('warning', "Kamu sedang mengakses akun: {$target->nama_mahasiswa}");
    }

    public function leave(Request $request)
    {
        if (! Session::has('impersonator')) {
            return redirect('/')->with('error', 'Tidak ada sesi impersonasi aktif');
        }

        $imp = Impersonate::find(Session::get('impersonation_log_id'));
        if ($imp) {
            $imp->update(['stopped_at' => now()]);
        }


        $adminId    = Session::get('impersonator.id');
        $adminGuard = Session::get('impersonator.guard');

        Auth::guard('mahasiswa')->logout();

        Session::forget(['impersonator', 'impersonation_log_id']);

        Auth::guard($adminGuard)->loginUsingId($adminId);
        Auth::shouldUse($adminGuard);

        $request->session()->regenerate();

        return redirect('/admin')->with('success', 'Kamu kembali ke akun admin');
    }
}
