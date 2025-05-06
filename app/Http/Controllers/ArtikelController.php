<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Facades\File;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function showArtikelAdmin(Request $request)
    {

        $search = $request->input('search');

        $artikel = Artikel::when($search, function ($query) use ($search) {
            return $query->where('judul_artikel', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(2);


        return view('admin.artikel.artikel', compact('artikel', 'search'));
    }

    public function showArtikelUser(Request $request)
    {
        $search = $request->input('search');

        $artikel = Artikel::when($search, function ($query) use ($search) {
            return $query->where('judul_artikel', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('ppkha.artikel', compact('artikel', 'search'));
    }

    public function showArtikelDetailUser($id)
    {
        // Ambil artikel yang sedang ditampilkan
        $artikel = Artikel::findOrFail($id);

        // Ambil semua artikel sebagai rekomendasi
        $artikelRekomendasi = Artikel::orderBy('created_at', 'desc')->get();

        return view('ppkha.detailArtikel', compact('artikel', 'artikelRekomendasi'));
    }

    public function createArtikel()
    {
        return view('admin.artikel.artikelAdd');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_artikel' => 'required|string',
            'deskripsi_artikel' => 'required|string',
            'sumber_artikel' => 'nullable|url',
            'gambar.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move(public_path('assets/data'), $filename);
                $gambarPaths[] = 'assets/data/' . $filename;
            }
        }

        Artikel::create([
            'judul_artikel' => $validatedData['judul_artikel'],
            'deskripsi_artikel' => $validatedData['deskripsi_artikel'],
            'sumber_artikel' => $validatedData['sumber_artikel'],
            'gambar' => $gambarPaths,
        ]);

        return redirect()->route('admin.artikel.artikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function showArtikelEditAdmin($id)
    {
        $artikel = Artikel::findOrFail($id); // Ambil data berita berdasarkan ID
        return view('admin.artikel.artikelEdit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $request->validate([
            'judul_artikel'     => 'required|string|max:255',
            'deskripsi_artikel' => 'required|string',
            'sumber_artikel'    => 'nullable|url',
            'gambar.*'          => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // data lama
        $gambarSekarang = $artikel->gambar ?? [];

        // Hapus file lama jika diminta
        if ($request->has('hapus_gambar')) {
            foreach ($request->hapus_gambar as $toDelete) {
                $fullPath = public_path($toDelete);
                if (in_array($toDelete, $gambarSekarang) && File::exists($fullPath)) {
                    File::delete($fullPath);
                    $gambarSekarang = array_diff($gambarSekarang, [$toDelete]);
                }
            }
        }

        // Upload file baru
        if ($request->hasFile('gambar')) {
            File::ensureDirectoryExists(public_path('assets/data'), 0755, true);

            foreach ($request->file('gambar') as $file) {
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move(public_path('assets/data'), $filename);
                $gambarSekarang[] = 'assets/data/' . $filename;
            }
        }

        // Update field dan simpan
        $artikel->update([
            'judul_artikel'     => $request->judul_artikel,
            'deskripsi_artikel' => $request->deskripsi_artikel,
            'sumber_artikel'    => $request->sumber_artikel,
            'gambar'            => array_values($gambarSekarang),
        ]);

        return redirect()->route('admin.artikel.artikel')
            ->with('success', 'Artikel berhasil diupdate!');
    }



    public function destroy($id)
    {
        try {
            $artikel = Artikel::findOrFail($id);
            $artikel->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus berita.'], 500);
        }
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.artikelDetail', compact('artikel'));
    }
}
