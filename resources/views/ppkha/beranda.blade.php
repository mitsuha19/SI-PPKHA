@extends('layouts.app')

@section('content')
@include('components.navbar')

<!-- Main Content with Background -->
<div class="content-with-background">
    <!-- Background Container -->
    <div class="background-container">
        <div class="wave wave-top">
            <svg viewBox="0 150 1440 671">
                <defs>
                    <linearGradient id="waveGradientTop" x1="0" y1="0" x2="0" y2="1" gradientUnits="objectBoundingBox">
                        <stop offset="10%" stop-color="#91D3E6"/>
                        <stop offset="60%" stop-color="#6FAEC7"/>
                        <stop offset="100%" stop-color="#436973"/>
                    </linearGradient>
                </defs>
                <path fill="url(#waveGradientTop)" fill-opacity="1"  /* Corrected opacity to 1 (valid range is 0 to 1) */
                    d="M-1 0H1439V303.04V606.08C1439 606.08 1209 506.379 1054 493.697C899 481.016 719 606.08 719 606.08C719 606.08 527.5 720.65 359 606.08C190.5 491.511 -1 606.08 -1 606.08V0Z">
                </path>
            </svg>
        </div>

        <div class="wave wave-bottom">
            <svg viewBox="0 0 1440 400">
                <defs>
                    <linearGradient id="waveGradientBottom" x1="0" y1="0" x2="0" y2="1" gradientUnits="objectBoundingBox">
                        <stop offset="0%" stop-color="#436973"/>
                        <stop offset="50%" stop-color="#7DC4D6"/>
                        <stop offset="100%" stop-color="#8ddaed"/>
                    </linearGradient>
                </defs>
                <path fill="url(#waveGradientBottom)" fill-opacity="1"
                d="M1440 657H0V353.96V50.9197C0 50.9197 230 150.621 385 163.303C540 175.984 720 50.9197 720 50.9197C720 50.9197 911.5 -63.6496 1080 50.9197C1248.5 165.489 1440 50.9197 1440 50.9197V657Z">
                </path>
            </svg>
        </div>
    </div>

    <!-- Hero Container (Beranda Section) -->
    <div class="hero-container">
        <div class="grid-container">
            <!-- Left: Text Section -->
            <div class="text-section">
                <h1>Selamat Datang,</h1>
                <h2>Di <span class="highlight">CAIS</span></h2>
                <p class="subheading">Career Alumni Information System</p>
                <p class="description">
                    Selamat datang di Laman Career Alumni Information System, Institut Teknologi Del.
                    Melalui website ini, Menghadirkan berbagai layanan, mulai dari portal karir, database alumni,
                    hingga layanan bimbingan karir yang membantu Anda meraih peluang terbaik di dunia profesional.
                </p>
            </div>

            <!-- Right: Image Section -->
            <div class="image-section">
                <img src="{{ asset('assets/images/tugu_Del.png') }}" alt="Monument">
            </div>
        </div>
    </div>

    <!-- Berita Section -->
    <div class="pengumuman-section">
        <h2 class="section-title">BERITA</h2>
        <div class="pengumuman-grid">
            <!-- Static Cards -->
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengumuman Section -->
    <div class="pengumuman-section">
        <h2 class="section-title">PENGUMUMAN</h2>
        <div class="pengumuman-grid">
            <!-- Static Cards -->
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Artikel Section -->
    <div class="pengumuman-section">
        <h2 class="section-title">ARTIKEL</h2>
        <div class="pengumuman-grid">
            <!-- Static Cards -->
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection