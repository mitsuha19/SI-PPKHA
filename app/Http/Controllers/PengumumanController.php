<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');

    $pengumuman = Pengumuman::when($search, function ($query) use ($search) {
      return $query->where('judul_pengumuman', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc')->paginate(2);

    return view('admin.pengumuman.pengumuman', compact('pengumuman', 'search'));
  }

  public function showPengumumanUser(Request $request)
  {
    $search = $request->input('search');

    $pengumuman = Pengumuman::when($search, function ($query) use ($search) {
      return $query->where('judul_pengumuman', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc')->paginate(10);
    return view('ppkha.pengumuman', compact('pengumuman', 'search'));
  }

  public function showPengumumanDetailUser($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('ppkha.detailPengumuman', compact('pengumuman'));
  }

  public function create()
  {
    return view('admin.pengumuman.pengumumanAdd');
  }

  public function show($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.pengumuman.pengumumanDetail', compact('pengumuman'));
  }


  public function store(Request $request)
  {
    $request->validate([
      'judul_pengumuman' => 'required|string',
      'deskripsi_pengumuman' => 'required|string',
      'lampiran.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx' // Validasi file
    ]);

    // Simpan lampiran
    $lampiranPaths = [];
    if ($request->hasFile('lampiran')) {
      foreach ($request->file('lampiran') as $file) {
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('assets/data'), $filename);
        $lampiranPaths[] = 'assets/data/' . $filename;
      }
    }

    // Simpan data pengumuman ke database
    $pengumuman = Pengumuman::create([
      'judul_pengumuman' => $request->judul_pengumuman,
      'deskripsi_pengumuman' => $request->deskripsi_pengumuman,
      'lampiran' => count($lampiranPaths) > 0 ? json_encode($lampiranPaths) : null, // Simpan dalam format JSON
    ]);

    return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.pengumuman.pengumumanEdit', compact('pengumuman'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'judul_pengumuman'      => 'required|string',
      'deskripsi_pengumuman'  => 'required|string',
      'lampiran.*'            => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:5120',
    ]);

    $pengumuman = Pengumuman::findOrFail($id);
    $current = json_decode($pengumuman->lampiran, true) ?? [];

    // Hapus lampiran lama jika diminta
    if ($request->has('hapus_lampiran')) {
      foreach ($request->hapus_lampiran as $toDelete) {
        $full = public_path($toDelete);
        if (in_array($toDelete, $current) && File::exists($full)) {
          File::delete($full);
          $current = array_diff($current, [$toDelete]);
        }
      }
    }

    // Tambah lampiran baru
    if ($request->hasFile('lampiran')) {
      File::ensureDirectoryExists(public_path('assets/data'), 0755, true);

      foreach ($request->file('lampiran') as $file) {
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('assets/data'), $filename);
        $current[] = 'assets/data/' . $filename;
      }
    }

    $pengumuman->update([
      'judul_pengumuman'     => $request->judul_pengumuman,
      'deskripsi_pengumuman' => $request->deskripsi_pengumuman,
      'lampiran'             => count($current) ? json_encode(array_values($current)) : null,
    ]);

    return redirect()->route('admin.pengumuman.index')
      ->with('success', 'Pengumuman berhasil diperbarui!');
  }

  public function destroy($id)
  {
    try {
      $pengumuman = Pengumuman::findOrFail($id);
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
