<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\TracerStudyController;

/*
|--------------------------------------------------------------------------
| Public/User Routes
|--------------------------------------------------------------------------
*/

// Public pages (ppkha)
Route::get('/', fn() => view('ppkha.beranda'));
Route::get('/berita', fn() => view('ppkha.berita'));
Route::get('/berita/detail', fn() => view('ppkha.detailBerita'));
Route::get('/pengumuman', fn() => view('ppkha.pengumuman'));
Route::get('/pengumuman/detail', fn() => view('ppkha.detailPengumuman'));
Route::get('/artikel', fn() => view('ppkha.artikel'));
Route::get('/daftar_perusahaan', fn() => view('ppkha.daftar_perusahaan'));
Route::get('/daftar_perusahaan/detail', fn() => view('ppkha.detailperusahaan'));
Route::get('/lowongan_pekerjaan', fn() => view('ppkha.lowongan_pekerjaan'));
Route::get('/lowongan_pekerjaan/detail', fn() => view('ppkha.detaillowongan'));
Route::get('/tracer_study', fn() => view('ppkha.tracer_study'))->middleware(['auth', 'role:admin|alumni']);
Route::get('/user_survey', fn() => view('ppkha.user_survey'));
Route::get('/tentang', fn() => view('ppkha.tentang'));

// Auth (Register & Login)
Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'role:admin']
], function () {

    // Dashboard
    Route::get('/', fn() => view('admin.dashboard'));

    // Berita
    Route::group(['prefix' => 'berita'], function () {
        Route::get('/', [BeritaController::class, 'index2'])->name('admin.berita.berita');
        Route::post('/', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::get('/tambah', [BeritaController::class, 'index3'])->name('admin.berita.add');
        Route::get('/detail/{id}', [BeritaController::class, 'show1'])->name('admin.berita.beritaDetail');
        Route::get('/{id}/edit', [BeritaController::class, 'index4'])->name('admin.berita.beritaEdit');
        Route::put('/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });

    // Pengumuman
    Route::group(['prefix' => 'pengumuman'], function () {
        Route::get('/', fn() => view('admin.pengumuman.pengumuman'));
        Route::get('/add', fn() => view('admin.pengumuman.pengumumanAdd'));
        Route::get('/detail', fn() => view('admin.pengumuman.pengumumanDetail'));
        Route::get('/edit', fn() => view('admin.pengumuman.pengumumanEdit'));
    });

    // Artikel
    Route::group(['prefix' => 'artikel'], function () {
        Route::get('/', fn() => view('admin.artikel.artikel'));
        Route::get('/add', fn() => view('admin.artikel.artikelAdd'));
        Route::get('/detail', fn() => view('admin.artikel.artikelDetail'));
        Route::get('/edit', fn() => view('admin.artikel.artikelEdit'));
    });

    // Daftar Perusahaan
    Route::group(['prefix' => 'daftar-perusahaan'], function () {
        Route::get('/', fn() => view('admin.daftarPerusahaan.daftarPerusahaan'));
        Route::get('/add', fn() => view('admin.daftarPerusahaan.daftarPerusahaanAdd'));
        Route::get('/edit', fn() => view('admin.daftarPerusahaan.daftarPerusahaanEdit'));
        Route::get('/detail', fn() => view('admin.daftarPerusahaan.daftarPerusahaanDetail'));
    });

    // Lowongan Pekerjaan
    Route::group(['prefix' => 'lowongan-pekerjaan'], function () {
        Route::get('/', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaan'));
        Route::get('/detail', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanDetail'));
        Route::get('/add', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanAdd'));
        Route::get('/edit', fn() => view('admin.lowonganPekerjaan.lowonganPekerjaanEdit'));
    });

    // Tracer Study
    Route::group(['prefix' => 'tracer-study'], function () {
        Route::get('/', [TracerStudyController::class, 'mainTracerStudy'])->name('admin.tracerStudy.tracerStudy');
        Route::get('/create', [TracerStudyController::class, 'createTracerStudy']);
        Route::post('/create', [TracerStudyController::class, 'store'])->name('admin.forms.store');
        Route::delete('/delete/{id}', [TracerStudyController::class, 'destroy'])->name('tracer-study.destroy');
        Route::get('/edit/{id}', [TracerStudyController::class, 'edit'])->name('admin.forms.edit');
        Route::put('/edit/{id}', [TracerStudyController::class, 'update'])->name('admin.forms.update');
        Route::resource('forms', TracerStudyController::class);
        Route::get('forms/{formId}/sections', [TracerStudyController::class, 'getSections']);
        Route::get('forms/{formId}/sections/{sectionId}/available', [TracerStudyController::class, 'getAvailableSections']);
    });

    // User Survey
    Route::get('/user-survey', fn() => view('admin.userSurvey'));
});

// Non-admin forms (if applicable)
Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
