<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Artikel;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        
        $pengumuman = Pengumuman::latest()->take(3)->get();

        // Mengambil artikel terbaru
        $artikel = Artikel::latest()->take(3)->get();

        // Mengambil berita terbaru
        $berita = Berita::latest()->take(3)->get();
       

        // Kirim data ke view
        return view('ppkha.beranda', compact('pengumuman', 'artikel', 'berita'));
    }
}
