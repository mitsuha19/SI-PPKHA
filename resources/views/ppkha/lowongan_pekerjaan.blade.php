@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <input type="text" class="top-search-input" placeholder="Cari Lowongan" />
                <button class="top-search-button">
                    <i class='bx bx-search bx-sm'></i>
                </button>
            </div>
        </div>

        <div class="d-flex flex-column align-items-center gap-4">
            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top m-0" alt="...">
                    <div class="horizontal-card-body w-100">
                        <div class="horizontal-card-text-section card-detail-perusahaan w-100">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <p class="mb-0 montserrat-light">Norxel Teknologi Indonesia</p>

                            <ul class="roboto-light text-black mb-1 mt-2 w-100" style="font-size: 15px">
                                <li>Membuat Laporan dan report</li>
                                <li>Menguasai microsoft excel dan microsoft word...</li>
                            </ul>  

                            
                            <div class="d-flex flex-row gap-2">
                                <div class="pills">KOTA JAKARTA UTARA</div>
                                <div class="pills">Administrasi</div>
                                <div class="pills">Full-Time</div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top m-0" alt="...">
                    <div class="horizontal-card-body w-100">
                        <div class="horizontal-card-text-section card-detail-perusahaan w-100">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <p class="mb-0 montserrat-light">Norxel Teknologi Indonesia</p>

                            <ul class="roboto-light text-black mb-1 mt-2 w-100" style="font-size: 15px">
                                <li>Membuat Laporan dan report</li>
                                <li>Menguasai microsoft excel dan microsoft word...</li>
                            </ul>  

                            
                            <div class="d-flex flex-row gap-2">
                                <div class="pills">KOTA JAKARTA UTARA</div>
                                <div class="pills">Administrasi</div>
                                <div class="pills">Full-Time</div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top m-0" alt="...">
                    <div class="horizontal-card-body w-100">
                        <div class="horizontal-card-text-section card-detail-perusahaan w-100">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <p class="mb-0 montserrat-light">Norxel Teknologi Indonesia</p>

                            <ul class="roboto-light text-black mb-1 mt-2 w-100" style="font-size: 15px">
                                <li>Membuat Laporan dan report</li>
                                <li>Menguasai microsoft excel dan microsoft word...</li>
                            </ul>  

                            
                            <div class="d-flex flex-row gap-2">
                                <div class="pills">KOTA JAKARTA UTARA</div>
                                <div class="pills">Administrasi</div>
                                <div class="pills">Full-Time</div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background-card">
                <div class="horizontal-card">
                    <img src="{{asset('assets/images/image.png')}}" class="card-img-top m-0" alt="...">
                    <div class="horizontal-card-body w-100">
                        <div class="horizontal-card-text-section card-detail-perusahaan w-100">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">Ratusan Mahasiswa Indonesia Terima Beasiswa</h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="#">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <p class="mb-0 montserrat-light">Norxel Teknologi Indonesia</p>

                            <ul class="roboto-light text-black mb-1 mt-2 w-100" style="font-size: 15px">
                                <li>Membuat Laporan dan report</li>
                                <li>Menguasai microsoft excel dan microsoft word...</li>
                            </ul>  

                            
                            <div class="d-flex flex-row gap-2">
                                <div class="pills">KOTA JAKARTA UTARA</div>
                                <div class="pills">Administrasi</div>
                                <div class="pills">Full-Time</div>
                              </div>
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