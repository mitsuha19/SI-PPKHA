<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;

Route::name('public.')->group(function () {
    Route::get('/', fn() => view('ppkha.beranda'))->name('beranda');
    Route::get('/berita', fn() => view('ppkha.berita'))->name('berita');
    Route::get('/berita/detail', fn() => view('ppkha.detailBerita'))->name('berita.detail');
    Route::get('/pengumuman', fn() => view('ppkha.pengumuman'))->name('pengumuman');
    Route::get('/pengumuman/detail', fn() => view('ppkha.detailPengumuman'))->name('pengumuman.detail');
    Route::get('/artikel', fn() => view('ppkha.artikel'))->name('artikel');
    Route::get('/daftar_perusahaan', fn() => view('ppkha.daftar_perusahaan'))->name('daftar_perusahaan');
    Route::get('/daftar_perusahaan/detail', fn() => view('ppkha.detailperusahaan'))->name('daftar_perusahaan.detail');
    Route::get('/lowongan_pekerjaan', fn() => view('ppkha.lowongan_pekerjaan'))->name('lowongan_pekerjaan');
    Route::get('/lowongan_pekerjaan/detail', fn() => view('ppkha.detaillowongan'))->name('lowongan_pekerjaan.detail');
    Route::get('/tentang', fn() => view('ppkha.tentang'))->name('tentang');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Tracer Study
    Route::prefix('tracer_study')->name('tracer_study.')->group(function () {
        Route::get('/', fn() => view('ppkha.tracer_study'))->name('index');
        Route::get('/create', fn() => view('admin.tracerStudy.tambahPertanyaan'))->name('create');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // Berita Routes
        Route::prefix('berita')->name('berita.')->group(function () {
            Route::get('/', [BeritaController::class, 'index2'])->name('index');
            Route::post('/', [BeritaController::class, 'store'])->name('store');
            Route::get('/add', [BeritaController::class, 'index3'])->name('add');
            Route::get('/detail', fn() => view('admin.berita.beritaDetail'))->name('detail');
            Route::get('/edit', fn() => view('admin.berita.beritaEdit'))->name('edit');
        });

        // Pengumuman Routes
        Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
            Route::get('/', fn() => view('admin.pengumuman.pengumuman'))->name('index');
            Route::get('/add', fn() => view('admin.pengumuman.pengumumanAdd'))->name('add');
            Route::get('/detail', fn() => view('admin.pengumuman.pengumumanDetail'))->name('detail');
            Route::get('/edit', fn() => view('admin.pengumuman.pengumumanEdit'))->name('edit');
        });

        // Artikel Routes
        Route::prefix('artikel')->name('artikel.')->group(function () {
            Route::get('/', fn() => view('admin.artikel.artikel'))->name('index');
            Route::get('/add', fn() => view('admin.artikel.artikelAdd'))->name('add');
            Route::get('/detail', fn() => view('admin.artikel.artikelDetail'))->name('detail');
            Route::get('/edit', fn() => view('admin.artikel.artikelEdit'))->name('edit');
        });

        // Daftar Perusahaan Routes
        Route::prefix('daftar-perusahaan')->name('daftar-perusahaan.')->group(function () {
            Route::get('/', fn() => view('admin.daftarPerusahaan.daftarPerusahaan'))->name('index');
            Route::get('/add', fn() => view('admin.daftarPerusahaan.daftarPerusahaanAdd'))->name('add');
            Route::get('/edit', fn() => view('admin.daftarPerusahaan.daftarPerusahaanEdit'))->name('edit');
            Route::get('/detail', fn() => view('admin.daftarPerusahaan.daftarPerusahaanDetail'))->name('detail');
        });

        // Lowongan Pekerjaan Routes
        Route::prefix('lowongan-pekerjaan')->name('lowongan-pekerjaan.')->group(function () {
            Route::get('/', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaan'))->name('index');
            Route::get('/detail', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanDetail'))->name('detail');
            Route::get('/add', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanAdd'))->name('add');
            Route::get('/edit', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanEdit'))->name('edit');
        });

        // User Survey Route
        Route::get('/user-survey', fn() => view('admin.userSurvey'))->name('user-survey');
    });
});

// Authentication Routes (from auth.php)
require __DIR__ . '/auth.php';
