<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest('tanggal_post')->take(3)->get();
        return view('welcome', compact('berita'));
    }
}
