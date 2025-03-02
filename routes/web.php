<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', function () {
    return view('ppkha.beranda');
});
})->name('public.beranda');

Route::get('/berita', function () {
    return view('ppkha.berita');
});
})->name('public.berita');

Route::get('/berita/detail', function () {
    return view('ppkha.detailBerita');
});
})->name('public.berita.detail');

Route::get('/pengumuman', function () {
    return view('ppkha.pengumuman');
})->name('public.pengumuman');

Route::get('/pengumuman/detail', function () {
    return view('ppkha.detailPengumuman');
});
})->name('public.pengumuman.detail');

Route::get('/artikel', function () {
    return view('ppkha.artikel');
});

Route::get('/pengumuman', function () {
    return view('ppkha.pengumuman');
});
})->name('public.artikel');

Route::get('/daftar_perusahaan', function () {
    return view('ppkha.daftar_perusahaan');
});
})->name('public.daftar_perusahaan');

Route::get('/daftar_perusahaan/detail', function () {
    return view('ppkha.detailperusahaan');
});
})->name('public.daftar_perusahaan.detail');

Route::get('/lowongan_pekerjaan', function () {
    return view('ppkha.lowongan_pekerjaan');
});

})->name('public.lowongan_pekerjaan');

Route::get('/lowongan_pekerjaan/detail', function () {
    return view('ppkha.detaillowongan');
});

Route::get('/tracer_study', function () {
    return view('ppkha.tracer_study');
});

Route::get('/user_survey', function () {
    return view('ppkha.user_survey');
});
})->name('public.lowongan_pekerjaan.detail');

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
    Route::get('/berita/add', [BeritaController::class, 'index3'])->name('admin.berita.add');
});

Route::get('/admin/berita/detail', function () {
    return view('admin.berita.beritaDetail');
});

Route::get('/admin/berita/edit', function () {
    return view('admin.berita.beritaEdit');
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
})->name('public.tentang');

// Authenticated Routes (for tracer_study and admin)
Route::middleware(['auth', 'verified'])->group(function () {
    // Tracer Study Routes
    Route::prefix('tracer_study')->name('tracer_study.')->group(function () {
        Route::get('/', function () {
            return view('ppkha.tracer_study');
        })->name('index');

        Route::get('/create', function () {
            return view('admin.tracerStudy.tambahPertanyaan');
        })->name('create');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Berita Routes
        Route::prefix('berita')->group(function () {
            Route::get('/', [BeritaController::class, 'index2'])->name('berita.index');
            Route::post('/', [BeritaController::class, 'store'])->name('berita.store');
            Route::get('/add', [BeritaController::class, 'index3'])->name('berita.add');
            Route::get('/detail', function () {
                return view('admin.berita.beritaDetail');
            })->name('berita.detail');
            Route::get('/edit', function () {
                return view('admin.berita.beritaEdit');
            })->name('berita.edit');
        });

        // Pengumuman Routes
        Route::prefix('pengumuman')->group(function () {
            Route::get('/', function () {
                return view('admin.pengumuman.pengumuman');
            })->name('pengumuman.index');

            Route::get('/add', function () {
                return view('admin.pengumuman.pengumumanAdd');
            })->name('pengumuman.add');

            Route::get('/detail', function () {
                return view('admin.pengumuman.pengumumanDetail');
            })->name('pengumuman.detail');

            Route::get('/edit', function () {
                return view('admin.pengumuman.pengumumanEdit');
            })->name('pengumuman.edit');
        });

        // Artikel Routes
        Route::prefix('artikel')->group(function () {
            Route::get('/', function () {
                return view('admin.artikel.artikel');
            })->name('artikel.index');

            Route::get('/add', function () {
                return view('admin.artikel.artikelAdd');
            })->name('artikel.add');

            Route::get('/detail', function () {
                return view('admin.artikel.artikelDetail');
            })->name('artikel.detail');

            Route::get('/edit', function () {
                return view('admin.artikel.artikelEdit');
            })->name('artikel.edit');
        });

        // Daftar Perusahaan Routes
        Route::prefix('daftar-perusahaan')->group(function () {
            Route::get('/', function () {
                return view('admin.daftarPerusahaan.daftarPerusahaan');
            })->name('daftar-perusahaan.index');

            Route::get('/add', function () {
                return view('admin.daftarPerusahaan.daftarPerusahaanAdd');
            })->name('daftar-perusahaan.add');

            Route::get('/edit', function () {
                return view('admin.daftarPerusahaan.daftarPerusahaanEdit');
            })->name('daftar-perusahaan.edit');

            Route::get('/detail', function () {
                return view('admin.daftarPerusahaan.daftarPerusahaanDetail');
            })->name('daftar-perusahaan.detail');
        });

        // Lowongan Pekerjaan Routes
        Route::prefix('lowongan-pekerjaan')->group(function () {
            Route::get('/', function () {
                return view('admin.lowonganPekerjaan.lowonganPekerjaan');
            })->name('lowongan-pekerjaan.index');

            Route::get('/detail', function () {
                return view('admin.lowonganPekerjaan.lowonganPekerjaanDetail');
            })->name('lowongan-pekerjaan.detail');

            Route::get('/add', function () {
                return view('admin.lowonganPekerjaan.lowonganPekerjaanAdd');
            })->name('lowongan-pekerjaan.add');

            Route::get('/edit', function () {
                return view('admin.lowonganPekerjaan.lowonganPekerjaanEdit');
            })->name('lowongan-pekerjaan.edit');
        });

        // User Survey Routes
        Route::get('/user-survey', function () {
            return view('admin.userSurvey');
        })->name('user-survey');
    });
});

// Profile Routes (Authenticated Only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes (from auth.php)
require __DIR__ . '/auth.php';
