<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/lowongan_pekerjaan', function () {
    return view('ppkha.lowongan_pekerjaan');
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

Route::get('/admin/berita', function () {
    return view('admin.berita');
});

Route::get('/admin/pengumuman', function () {
    return view('admin.pengumuman');
});

Route::get('/admin/artikel', function () {
    return view('admin.artikel');
});

Route::get('/admin/daftar-perusahaan', function () {
    return view('admin.daftarPerusahaan');
});

Route::get('/admin/lowongan-pekerjaan', function () {
    return view('admin.lowonganPekerjaan');
});

Route::get('/admin/tracer-study', function () {
    return view('admin.tracerStudy');
});

Route::get('/admin/user-survey', function () {
    return view('admin.userSurvey');
});