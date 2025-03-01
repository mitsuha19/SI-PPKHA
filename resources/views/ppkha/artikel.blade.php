@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg')
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <input type="text" class="top-search-input" placeholder="Cari Artikel" />
                <button class="top-search-button">
                    <img class="top-search-icon" src="{{asset('assets/images/search.png')}}" alt="Search">
                </button>
            </div>
        </div>
        <div class="pengumuman-section">
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
        <div class="pengumuman-section">
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
        <div class="pengumuman-section">
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
        <div class="horizontal-card mt-4">
            <!-- Pagination Section (Centered below the cards) -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    @include('components.footer')
@endsection