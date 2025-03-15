<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TracerStudyController;

// user ppkha
Route::get('/', function () {
    return view('ppkha.beranda');
});

Route::get('/berita', function () {
    return view('ppkha.berita');
});

Route::get('/berita/detail', function () {
    return view('ppkha.detailBerita');
});

Route::get('/pengumuman', function () {
    return view('ppkha.pengumuman');
});
Route::get('/pengumuman/detail', function () {
    return view('ppkha.detailPengumuman');
});

Route::get('/artikel', function () {
    return view('ppkha.artikel');
});

Route::get('/daftar_perusahaan', function () {
    return view('ppkha.daftar_perusahaan');
});

Route::get('/daftar_perusahaan/detail', function () {
    return view('ppkha.detailperusahaan');
});

Route::get('/lowongan_pekerjaan', function () {
    return view('ppkha.lowongan_pekerjaan');
});


Route::get('/lowongan_pekerjaan/detail', function () {
    return view('ppkha.detaillowongan');
});

Route::get('/tracer_study', function () {
    return view('ppkha.tracer_study');
});

Route::get('/user_survey', function () {
    return view('ppkha.user_survey');
});

Route::get('/tentang', function () {
    return view('ppkha.tentang');
});


// Admin
Route::get('/admin', function () {
    return view('admin.dashboard');
});

// berita
Route::prefix('admin')->group(function () {
    Route::get('/berita', [BeritaController::class, 'index2'])->name('admin.berita.berita');
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/tambah', [BeritaController::class, 'index3'])->name('admin.berita.add');
    Route::get('/berita/detail/{id}', [BeritaController::class, 'show1'])->name('admin.berita.beritaDetail');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'index4'])->name('admin.berita.beritaEdit');
    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});

//pengumuman 
Route::prefix('admin/pengumuman')->name('admin.pengumuman.')->group(function () {
    Route::get('/', [PengumumanController::class, 'index'])->name('index');
    Route::get('/create', [PengumumanController::class, 'create'])->name('create');
    Route::post('/store', [PengumumanController::class, 'store'])->name('store');
    Route::get('/{id}', [PengumumanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PengumumanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PengumumanController::class, 'update'])->name('update'); // <=== PASTIKAN ROUTE INI ADA
    Route::delete('/{id}', [PengumumanController::class, 'destroy'])->name('destroy');
});


// artikel
Route::get('/admin/artikel', function () {
    return view('admin.artikel.artikel');
});

Route::get('/admin/artikel/add', function () {
    return view('admin.artikel.artikelAdd');
});

Route::get('/admin/artikel/detail', function () {
    return view('admin.artikel.artikelDetail');
});

Route::get('/admin/artikel/edit', function () {
    return view('admin.artikel.artikelEdit');
});






// daftar perusahaan
Route::get('/admin/daftar-perusahaan', function () {
    return view('admin.daftarPerusahaan.daftarPerusahaan');
});

Route::get('/admin/daftar-perusahaan/add', function () {
    return view('admin.daftarPerusahaan.daftarPerusahaanAdd');
});

Route::get('/admin/daftar-perusahaan/edit', function () {
    return view('admin.daftarPerusahaan.daftarPerusahaanEdit');
});

Route::get('/admin/daftar-perusahaan/detail', function () {
    return view('admin.daftarPerusahaan.daftarPerusahaanDetail');
});

//lowongan pekerjaan
Route::get('/admin/lowongan-pekerjaan', function () {
    return view('admin.lowonganPekerjaan.lowonganPekerjaan');
});

Route::get('/admin/lowongan-pekerjaan/detail', function () {
    return view('admin.lowonganPekerjaan.lowonganPekerjaanDetail');
});

Route::get('/admin/lowongan-pekerjaan/add', function () {
    return view('admin.lowonganPekerjaan.lowonganPekerjaanAdd');
});

Route::get('/admin/lowongan-pekerjaan/edit', function () {
    return view('admin.lowonganPekerjaan.lowonganPekerjaanEdit');
});

//tracerstudy
Route::get('/admin/tracer-study', [TracerStudyController::class, 'mainTracerStudy'])->name('admin.tracerStudy.tracerStudy');
Route::get('/admin/tracer-study/create', [TracerStudyController::class, 'createTracerStudy']);
Route::post('/admin/tracer-study/create', [TracerStudyController::class, 'store'])->name('admin.forms.store');
Route::delete('/admin/tracer-study/delete/{id}', [TracerStudyController::class, 'destroy'])->name('tracer-study.destroy');
Route::get('/admin/tracer-study/edit/{id}', [TracerStudyController::class, 'edit'])->name('admin.forms.edit');
Route::put('/admin/tracer-study/edit/{id}', [TracerStudyController::class, 'update'])->name('admin.forms.update');
Route::resource('forms', TracerStudyController::class);
Route::get('forms/{formId}/sections', [TracerStudyController::class, 'getSections']);
Route::get('forms/{formId}/sections/{sectionId}/available', [TracerStudyController::class, 'getAvailableSections']);

//user survey
Route::get('/admin/user-survey', function () {
    return view('admin.userSurvey');
});


// form kuisioner
Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
Route::get('/forms', [FormController::class, 'index'])->name('forms.index');

// Test Kuisioner ke user
Route::get('/kuesioner', [KuesionerController::class, 'show'])->name('kuesioner.show');
Route::post('/kuesioner/next/{sectionId}', [KuesionerController::class, 'nextSection'])->name('kuesioner.next');
Route::get('/kuesioner/selesai', [KuesionerController::class, 'submit'])->name('kuesioner.submit');


Route::get('/proxy/provinces', function () {
    try {
        $response = Http::withOptions(["verify" => false])
            ->get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal mengambil data dari API eksternal'], 500);
        }

        return response($response->body())->header('Content-Type', 'application/json');
    } catch (\Exception $e) {
        return response()->json(['error' => 'Server Error: ' . $e->getMessage()], 500);
    }
});

Route::get('/proxy/regencies/{provinceId}', function ($provinceId) {
    try {
        $response = Http::withOptions(["verify" => false])
            ->get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$provinceId.json");

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal mengambil data dari API eksternal'], 500);
        }

        return response($response->body())->header('Content-Type', 'application/json');
    } catch (\Exception $e) {
        return response()->json(['error' => 'Server Error: ' . $e->getMessage()], 500);
    }
});
