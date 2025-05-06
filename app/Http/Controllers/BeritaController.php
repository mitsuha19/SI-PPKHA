<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index2(Request $request)
    {
        $search = $request->input('search');

        $berita = Berita::when($search, function ($query) use ($search) {
            return $query->where('judul_berita', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(2);

        return view('admin.berita.berita', compact('berita', 'search'));
    }



    public function showBeritaUser(Request $request)
    {
        $search = $request->input('search');

        $berita = Berita::when($search, function ($query) use ($search) {
            return $query->where('judul_berita', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('ppkha.berita', compact('berita', 'search'));
    }

    public function showBeritaDetailUser($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('ppkha.detailBerita', compact('berita'));
    }

    public function index3()
    {
        return view('admin.berita.beritaAdd');
    }

    public function index4($id)
    {
        $berita = Berita::findOrFail($id); // Ambil data berita berdasarkan ID
        return view('admin.berita.beritaEdit', compact('berita'));
    }

    public function show1($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('admin.berita.beritaDetail', compact('berita'));
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
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move(public_path('assets/data'), $filename);
                $gambarPaths[] = 'assets/data/' . $filename;
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
        $validated = $request->validate([
            'judul_berita'     => 'required|string',
            'deskripsi_berita' => 'required|string',
            'gambar.*'         => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $current = $berita->gambar ?? [];

        // Hapus gambar lama jika diminta
        if ($request->has('hapus_gambar')) {
            foreach ($request->hapus_gambar as $toDelete) {
                $full = public_path($toDelete);
                if (in_array($toDelete, $current) && File::exists($full)) {
                    File::delete($full);
                    $current = array_diff($current, [$toDelete]);
                }
            }
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            File::ensureDirectoryExists(public_path('assets/data'), 0755, true);

            foreach ($request->file('gambar') as $file) {
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->move(public_path('assets/data'), $filename);
                $current[] = 'assets/data/' . $filename;
            }
        }

        $berita->update([
            'judul_berita'     => $validated['judul_berita'],
            'deskripsi_berita' => $validated['deskripsi_berita'],
            'gambar'           => array_values($current),
        ]);

        return redirect()->route('admin.berita.berita')
            ->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $berita->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus berita.'], 500);
        }
    }
}
