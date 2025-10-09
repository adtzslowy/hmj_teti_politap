<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('admin.anggota.index');
    }

    public function create()
    {
        return view('admin.anggota.create');
    }
}
