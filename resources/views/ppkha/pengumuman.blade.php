@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <input type="text" class="top-search-input" placeholder="Cari Pengumuman" />
                <button class="top-search-button">
                    <img class="top-search-icon" src="{{asset('assets/images/search.png')}}" alt="Search">
                </button>
            </div>
        </div>
        <!-- Berita Section -->
        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Berita Section -->
        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="horizontal-card mt-4">
            <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
            <div class="horizontal-card-body">
                <div class="horizontal-card-text-section">
                    <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                    <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                    <a href="#" class="horizontal-card-btn btn btn-outline-dark btn-sm">Selengkapnya</a>
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