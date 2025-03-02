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
                <h1 class="poppins-semibold mb-0 text-black" style="font-size: 48px">Selamat Datang,</h1>
                <div class="d-flex align-items-center gap-3 mb-0">
                    <p class="poppins-semibold text-black mb-0" style="font-size: 32px">Di</p>
                    <h2 class="poppins-semibold highlight mb-0">CAIS</h2>
                </div>
                <p class="subheading poppins-semibold">Career Alumni Information System</p>
                <p class="description roboto-title m-0 w-100" style="font-size: 15px">
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
    <div class="berita-section">
        <h2 class="section-title">BERITA</h2>
        <div class="berita-grid">
            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-chevron-left bx-lg'></i>
            </div>

            <!-- Static Cards -->
            <div class="background-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-start roboto-title">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                        <p class="roboto-light text-white" style="font-size: 14px">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        <div class="d-flex justify-content-end ">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="background-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-start roboto-title">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                        <p class="roboto-light text-white" style="font-size: 14px">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        <div class="d-flex justify-content-end">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-start roboto-title">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                        <p class="roboto-light text-white" style="font-size: 14px">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        <div class="d-flex justify-content-end">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-chevron-right bx-lg'></i>
            </div>
            
        </div>
    </div>

    <!-- Pengumuman Section -->
    <div class="pengumuman-section">
        <h2 class="section-title">PENGUMUMAN</h2>
        <div class="pengumuman-grid">
            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-chevron-left bx-lg'></i>
            </div>

            <!-- Static Cards -->
            <div class="bg-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-center roboto-title mb-3">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                        <div class="d-flex justify-content-end">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-center roboto-title mb-3">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                        <div class="d-flex justify-content-end">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                    <div class="card-detail">
                        <h5 class="card-title text-center roboto-title mb-3">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                        <div class="d-flex justify-content-end">
                            <a href="#">Selengkapnya...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-chevron-right bx-lg'></i>
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