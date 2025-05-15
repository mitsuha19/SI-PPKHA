@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <style>
        
        @media (max-width: 768px) {
            .card-information {
                flex-direction: column;
                align-items: center;
                text-align: justify;
            }

            .card-information .ps-4 {
                padding-left: 0 !important;
            }

            .top-search-bar {
                flex-direction: column;
                gap: 0.5rem;
            }

            .top-search-bar input,
            .top-search-bar button {
                width: 100%;
            }
        }

        .load-more-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .load-more-btn {
            padding: 0.5rem 1.5rem;
            border: none;
            background-color: #0d6efd;
            color: white;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>


    <div class="content-with-background">
        @include('components.bg')

        <!-- Top Search Bar -->
        <div class="top-search-bar-container">
            <div class="top-search-bar">
                <form class="d-flex w-100" action="{{ route('ppkha.daftarPerusahaan') }}" method="GET">
                    <input type="text" id="perusahaan" name="search" class="form-control me-2"
                        placeholder="Cari Perusahaan..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class='bx bx-search bx-sm'></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Daftar Perusahaan --}}
        <div class="d-flex flex-column align-items-center gap-4">

            @foreach ($perusahaan as $p)
                <div class="background-card" style="width: 80%; min-height: 200px; display: flex; align-items: center;">
                    <div class="card-information d-flex align-items-stretch px-3 w-100" style="min-height: 200px;">

                        {{-- Logo Perusahaan (tanpa background putih) --}}
                        <div
                            style="width: 120px; height: 120px; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ $p->logo ? asset($p->logo) : asset('assets/images/default-logo.png') }}"
                                alt="Logo Perusahaan"
                                style="width: 100px; height: 100px; object-fit: contain; border-radius: 10px;">
                        </div>

                        {{-- Detail Perusahaan --}}
                        <div class="ps-4 d-flex flex-column justify-content-between w-100">
                            <div class="card-detail-perusahaan d-flex flex-column h-100 justify-content-between">

                                {{-- Nama & Detail Link --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold mb-0">{{ $p->namaPerusahaan }}</h5>
                                    <div class="d-flex align-items-center gap-1 detail">
                                        <a href="{{ route('ppkha.daftarPerusahaanDetail', ['id' => $p->id]) }}">Detail</a>
                                        <i class='bx bx-sm bx-right-arrow-alt'></i>
                                    </div>
                                </div>

                                <hr class="my-1" style="border: 2px solid black; opacity: 1">

                                {{-- Lokasi & Industri --}}
                                <div class="d-flex align-items-center mb-2" style="gap: 8px;">
                                    <p class="mb-0 montserrat-light">{{ $p->lokasiPerusahaan }}</p>
                                    <div class="circle"
                                        style="width: 6px; height: 6px; background: black; border-radius: 50%;"></div>
                                    <p class="mb-0 montserrat-medium">{{ $p->industriPerusahaan }}</p>
                                </div>

                                {{-- Deskripsi Perusahaan --}}
                                <p class="horizontal-card-text mb-0" style="flex-grow: 1;">
                                    {{ Str::limit($p->deskripsiPerusahaan, 200, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Tombol Load More --}}
        <div class="load-more-container mt-4">
            <button class="load-more-btn">Muat Lebih Banyak</button>
        </div>
    </div>

    @include('components.footer')
@endsection
