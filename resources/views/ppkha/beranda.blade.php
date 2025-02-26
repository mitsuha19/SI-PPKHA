@extends('layouts.app')

@section('content')
@include('components.navbar')

<!-- Main Content with Background -->
<div class="content-with-background">
    @include('components.bg')

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