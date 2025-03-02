@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar gap-3">
                <input type="text" class="top-search-input" placeholder="Cari Berita" />
                <button class="top-search-button">
                    <i class='bx bx-search bx-sm'></i>
                </button>
            </div>
        </div>

        <!-- Berita Section -->
        <div class="d-flex flex-column align-items-center gap-4">
            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail">
                            <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                            <div class="d-flex justify-content-end">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail">
                            <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                            <div class="d-flex justify-content-end">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail">
                            <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                            <div class="d-flex justify-content-end">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail">
                            <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                            <div class="d-flex justify-content-end">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail">
                            <h5 class="horizontal-card-title fw-bold">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                            <div class="d-flex justify-content-end">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection