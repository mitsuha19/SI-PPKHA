<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('ppkha.beranda');
});

Route::get('/berita', function () {
    return view('ppkha.berita');
});

Route::get('/berita/detail', function () {
    return view('ppkha.detailBerita');
});

Route::get('/pengumuman/detail', function () {
    return view('ppkha.detailPengumuman');
});

Route::get('/artikel', function () {
    return view('ppkha.artikel');
});

Route::get('/pengumuman', function () {
    return view('ppkha.pengumuman');
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
Route::get('/admin/pengumuman', function () {
    return view('admin.pengumuman.pengumuman');
});

Route::get('/admin/pengumuman/add', function () {
    return view('admin.pengumuman.pengumumanAdd');
});

Route::get('/admin/pengumuman/detail', function () {
    return view('admin.pengumuman.pengumumanDetail');
});

Route::get('/admin/pengumuman/edit', function () {
    return view('admin.pengumuman.pengumumanEdit');
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
Route::get('/admin/tracer-study', function () {
    return view('admin.tracerStudy.tracerStudy');
});
Route::get('/admin/tracer-study/create', function () {
    return view('admin.tracerStudy.tambahPertanyaan');
});

//user survey
Route::get('/admin/user-survey', function () {
    return view('admin.userSurvey');
});
