<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
  public function index()
  {
    $pengumuman = Pengumuman::paginate(10);
    return view('admin.pengumuman.pengumuman', compact('pengumuman'));
  }

  public function create()
  {
    return view('admin.pengumuman.pengumumanAdd');
  }

  public function edit($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.pengumuman.pengumumanEdit', compact('pengumuman'));
  }

  public function show($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.pengumuman.pengumumanDetail', compact('pengumuman'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'judul_pengumuman' => 'required|string|max:255',
      'deskripsi_pengumuman' => 'required|string',
      'lampiran.*' => 'nullable|file|max:10240',
    ]);

    $lampiranPaths = [];
    if ($request->hasFile('lampiran')) {
      foreach ($request->file('lampiran') as $file) {
        $lampiranPaths[] = $file->store('lampiran', 'public');
      }
    }

    Pengumuman::create([
      'judul_pengumuman' => $validatedData['judul_pengumuman'],
      'deskripsi_pengumuman' => $validatedData['deskripsi_pengumuman'],
      'lampiran' => json_encode($lampiranPaths),
    ]);

    return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
  }

  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'judul_pengumuman' => 'required|string|max:255',
      'deskripsi_pengumuman' => 'required|string',
      'lampiran.*' => 'nullable|file|max:10240',
    ]);

    $pengumuman = Pengumuman::findOrFail($id);
    $lampiranPaths = json_decode($pengumuman->lampiran ?? '[]', true);

    // Hapus lampiran yang dicentang
    if ($request->has('hapus_lampiran')) {
      foreach ($request->hapus_lampiran as $file) {
        if (Storage::disk('public')->exists($file)) {
          Storage::disk('public')->delete($file);
        }
        $lampiranPaths = array_diff($lampiranPaths, [$file]);
      }
    }

    // Simpan lampiran baru jika ada
    if ($request->hasFile('lampiran')) {
      foreach ($request->file('lampiran') as $file) {
        $lampiranPaths[] = $file->store('lampiran', 'public');
      }
    }

    $pengumuman->update([
      'judul_pengumuman' => $validatedData['judul_pengumuman'],
      'deskripsi_pengumuman' => $validatedData['deskripsi_pengumuman'],
      'lampiran' => json_encode(array_values($lampiranPaths)), // Pastikan array bersih
    ]);

    return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
  }


  public function destroy($id)
  {
    try {
      $pengumuman = Pengumuman::findOrFail($id);

      // Hapus lampiran dari storage
      $lampiranPaths = json_decode($pengumuman->lampiran ?? '[]', true);
      foreach ($lampiranPaths as $file) {
        if (Storage::disk('public')->exists($file)) {
          Storage::disk('public')->delete($file);
        }
      }

      $pengumuman->delete();
      return response()->json(['success' => true]);
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'message' => 'Gagal menghapus pengumuman.'], 500);
    }
  }
}
