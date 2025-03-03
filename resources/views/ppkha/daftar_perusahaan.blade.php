@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <input type="text" class="top-search-input" placeholder="Cari Perusahaan" />
                <button class="top-search-button">
                    <i class='bx bx-search bx-sm'></i>
                </button>
            </div>
        </div>
        
        {{-- Daftar Perusahaan Section --}}
        <div class="d-flex flex-column align-items-center gap-4">
            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail-perusahaan">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <div class="d-flex flex-row align-items-center mb-2" style="gap: 5px">
                              <p class="mb-0 montserrat-light">Kota Semarang</p>
                              <div class="circle"></div>
                              <p class="mb-0 montserrat-medium">Industri Perbankan</p>
                            </div>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/Google.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail-perusahaan">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Microsoft Corporation</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <div class="d-flex flex-row align-items-center mb-2" style="gap: 5px">
                              <p class="mb-0 montserrat-light">Kota Semarang</p>
                              <div class="circle"></div>
                              <p class="mb-0 montserrat-medium">Industri Perbankan</p>
                            </div>
                            <p class="horizontal-card-text">
                                Microsoft Corporation is trusted by a diverse range of clients, including state-owned enterprises, multinational corporations, leading mining and oil and gas companies, government agencies, start-ups, e-commerce businesses, digital and fintech companies, as well as many notable individuals across...
                            </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail-perusahaan">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <div class="d-flex flex-row align-items-center mb-2" style="gap: 5px">
                              <p class="mb-0 montserrat-light">Kota Semarang</p>
                              <div class="circle"></div>
                              <p class="mb-0 montserrat-medium">Industri Perbankan</p>
                            </div>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top" alt="...">
                    <div class="horizontal-card-body">
                        <div class="horizontal-card-text-section card-detail-perusahaan">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <div class="d-flex flex-row align-items-center mb-2" style="gap: 5px">
                              <p class="mb-0 montserrat-light">Kota Semarang</p>
                              <div class="circle"></div>
                              <p class="mb-0 montserrat-medium">Industri Perbankan</p>
                            </div>
                            <p class="horizontal-card-text">204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="load-more-container">
            <button class="load-more-btn">Muat Lebih Banyak</button>
        </div>
    </div>

    @include('components.footer')
@endsection