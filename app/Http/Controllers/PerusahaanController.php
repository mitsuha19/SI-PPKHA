<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    // Menampilkan semua perusahaan (Admin)
    public function index2(Request $request)
    {
        $search = $request->input('search');

        $perusahaan = Perusahaan::when($search, function ($query) use ($search) {
            return $query->where('namaPerusahaan', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(2);

        return view('admin.daftarPerusahaan.daftarPerusahaan', compact('perusahaan', 'search'));
    }

    // Menampilkan semua perusahaan (User)
    public function showPerusahaanUser(Request $request)
    {
        $search = $request->input('search');

        $perusahaan = Perusahaan::when($search, function ($query) use ($search) {
            return $query->where('namaPerusahaan', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(10); // Gunakan paginate agar selalu berupa Collection

        return view('ppkha.daftar_perusahaan', compact('perusahaan', 'search'));
    }

    // Menampilkan detail perusahaan untuk User
    public function showPerusahaanDetailUser($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $lowongan = Lowongan::where('perusahaan_id', $id)->get();

        return view('ppkha.detailperusahaan', compact('perusahaan', 'lowongan'));
    }

    // Menampilkan form edit perusahaan (Admin)
    public function index4($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $lowongan = Lowongan::where('perusahaan_id', $id)->get(); // Perbaikan di sini

        return view('admin.daftarPerusahaan.daftarPerusahaanEdit', compact('perusahaan', 'lowongan'));
    }

    // Menampilkan detail perusahaan (Admin)
    public function show1($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $lowongan = Lowongan::where('perusahaan_id', $id)->get();

        return view('admin.daftarPerusahaan.daftarPerusahaanDetail', compact('perusahaan', 'lowongan'));
    }

    // Menampilkan detail perusahaan dalam format JSON
    public function show($id)
    {
        $perusahaan = Perusahaan::find($id);

        if (!$perusahaan) {
            return response()->json(['message' => 'Perusahaan tidak ditemukan'], 404);
        }

        return response()->json($perusahaan);
    }

    // Mengupdate data perusahaan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'namaPerusahaan'       => 'required|string',
            'lokasiPerusahaan'     => 'required|string',
            'websitePerusahaan'    => 'nullable|url',
            'industriPerusahaan'   => 'required|string',
            'deskripsiPerusahaan'  => 'required|string',
            'logo'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        // Pastikan direktori untuk logo ada
        File::ensureDirectoryExists(public_path('assets/data/logos'), 0755, true);

        // Jika ada file logo baru, simpan dan hapus logo lama
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($perusahaan->logo && File::exists(public_path($perusahaan->logo))) {
                File::delete(public_path($perusahaan->logo));
            }

            // Simpan logo baru
            $logoFile = $request->file('logo');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $logoFile->getClientOriginalName());
            $logoFile->move(public_path('assets/data/logos'), $filename);
            $logoPath = 'assets/data/logos/' . $filename;
        } else {
            // Gunakan logo lama jika tidak ada perubahan
            $logoPath = $perusahaan->logo;
        }

        // Update data perusahaan
        $perusahaan->update([
            'namaPerusahaan'       => $validated['namaPerusahaan'],
            'lokasiPerusahaan'     => $validated['lokasiPerusahaan'],
            'websitePerusahaan'    => $validated['websitePerusahaan'],
            'industriPerusahaan'   => $validated['industriPerusahaan'],
            'deskripsiPerusahaan'  => $validated['deskripsiPerusahaan'],
            'logo'                 => $logoPath,
        ]);

        return redirect()
            ->route('admin.daftarPerusahaan.daftarPerusahaan')
            ->with('success', 'Perusahaan berhasil diperbarui');
    }

    // Menghapus perusahaan
    public function destroy($id)
    {
        try {
            $perusahaan = Perusahaan::findOrFail($id);
            $perusahaan->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus perusahaan.'], 500);
        }
    }
}
