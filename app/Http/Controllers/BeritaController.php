<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index2()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('admin.berita.berita', compact('berita'));
    }

    public function index3()
    {
        return view('admin.berita.beritaAdd');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|string',
            'deskripsi_berita' => 'required|string',
            'gambar.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gambarPaths[] = $file->store('gambar', 'public');
            }
        }

        Berita::create([
            'judul_berita' => $validatedData['judul_berita'],
            'deskripsi_berita' => $validatedData['deskripsi_berita'],
            'gambar' => $gambarPaths,
        ]);

        return redirect()->route('admin.berita.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|string',
            'detail_berita' => 'required|string',
            'gambar.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx,xls|max:5120',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->has('hapus_gambar')) {
            foreach ($request->hapus_gambar as $file) {
                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }

            $berita->gambar = array_diff($berita->gambar ?? [], $request->hapus_gambar);
        }

        $gambarPaths = $berita->gambar ?? [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gambarPaths[] = $file->store('gambar', 'public');
            }
        }

        $berita->update([
            'judul_berita' => $validatedData['judul_berita'],
            'detail_berita' => $validatedData['detail_berita'],
            'gambar' => $gambarPaths,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diupdate!');
    }
}
