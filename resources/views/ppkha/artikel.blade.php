@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg')
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <input type="text" class="top-search-input h-100" placeholder="Cari Artikel" />
                <button class="top-search-button h-100">
                    <i class='bx bx-search bx-sm'></i>
                </button>
            </div>
        </div>
        <div class="pengumuman-section d-flex flex-column align-items-center gap-4">
            <div class="pengumuman-grid" style="display: flex; flex-wrap: wrap;">
                <!-- Static Cards -->
                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="background-card">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                        <div class="card-detail">
                            <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center w-100">
            <div class="pagination" style="width: fit-content">
                <a href="#" style="background-color: transparent">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">...</a>
                <a href="#" style="background-color: transparent">&raquo;</a>
            </div>
        </div>

    </div>

    @include('components.footer')
@endsection