<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function showArtikelAdmin(Request $request){

      $search = $request->input('search');

    $artikel = Artikel::when($search, function ($query) use ($search) {
        return $query->where('judul_artikel', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc')->paginate(2);

        
        return view('admin.artikel.artikel', compact('artikel', 'search'));
    }

    public function createArtikel(){
        return view('admin.artikel.artikelAdd');
    }

    public function store(Request $request){
        $request->validate([
        'judul_artikel' => 'required|string|max:255',
        'deskripsi_artikel' => 'required|string',
        'gambar.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048' // Validasi file
        ]);

        // Simpan lampiran
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $file) {
            $path = $file->store('gambar_artikel', 'public'); // Simpan ke storage/app/public/lampiran_artikel
            $gambarPaths[] = $path;
        }
        }

        // Simpan data pengumuman ke database
        $artikel = Artikel::create([
        'judul_artikel' => $request->judul_artikel,
        'deskripsi_artikel' => $request->deskripsi_artikel,
        'gambar' => count($gambarPaths) > 0 ? json_encode($gambarPaths) : null, // Simpan dalam format JSON
        ]);

        return redirect()->route('admin.artikel.artikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function showArtikelEditAdmin($id){
        $artikel = Artikel::findOrFail($id);// Ambil data berita berdasarkan ID
        return view('admin.artikel.artikelEdit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'deskripsi_artikel' => 'required|string',
            'gambar.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Update data pengumuman
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi_artikel = $request->deskripsi_artikel;

        // Hapus lampiran yang dipilih
        if ($request->has('hapus_gambar')) {
            $gambarTerbaru = json_decode($artikel->gambar, true) ?? [];
    
            foreach ($request->hapus_gambar as $file) {
            if ($file) { // Hanya hapus jika file tidak null
                Storage::delete($file);
                $lampiranTerbaru = array_filter($gambarTerbaru, fn($item) => $item !== $file);
            }
            }
    
            // Simpan kembali daftar lampiran yang tersisa
            $artikel->gambar = json_encode(array_values($lampiranTerbaru));
        }
    
        // Tambahkan lampiran baru
        if ($request->hasFile('gambar')) {
            $gambarBaru = [];
            foreach ($request->file('gambar') as $file) {
            $path = $file->store('gambar_pengumuman', 'public');
            $lampiranBaru[] = $path;
            }
    
            // Gabungkan dengan lampiran yang masih ada
            $gambarLama = json_decode($artikel->gambar, true) ?? [];
            $artikel->gambar = json_encode(array_merge($gambarLama, $gambarBaru));
        }
        $artikel->save();
    
        return redirect()->route('admin.artikel.artikel')->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy($id){
    try {
      $artikel = Artikel::findOrFail($id);
      $gambarPaths = json_decode($artikel->gambar ?? '[]', true);

      foreach ($gambarPaths as $file) {
        if (Storage::disk('public')->exists($file)) {
          Storage::disk('public')->delete($file);
        }
      }

      $artikel->delete();
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => 'Gagal menghapus pengumuman.'], 500);
    }
  }

  public function show($id){
    $artikel = Artikel::findOrFail($id);
    return view('admin.artikel.artikelDetail', compact('artikel'));
  }
}
