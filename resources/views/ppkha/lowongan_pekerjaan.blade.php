@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->
        
        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar-container">
            <div class="top-search-bar gap-3">
                <input type="text" class="top-search-input" placeholder="Cari Lowongan Pekerjaan" />
                <button class="top-search-button">
                    <i class='bx bx-search bx-sm'></i>
                </button>
            </div>
        </div>

        <div class="d-flex flex-column align-items-center gap-4">

            @foreach($lowongan as $l)
            <div class="background-card">
                <div class="card-information d-flex align-items-center px-3">
                    @if ($l->perusahaan && $l->perusahaan->logo)
                        <img src="{{ asset('storage/' . $l->perusahaan->logo) }}" alt="Logo Perusahaan">
                    @endif

                    <div class="ps-3 w-100">
                        <div class="horizontal-card-text-section card-detail-perusahaan w-100">

                              <div class="d-flex flex-row w-auto justify-content-between align-items-center w-100">
                                <h5 class="horizontal-card-title fw-bold mb-0">
                                    {{ $l->judulLowongan }}
                                </h5>
                                <div class="d-flex flex-row justify-content-center align-items-center gap-1 detail">
                                    <a href="{{ route('ppkha.lowonganPekerjaanDetail', ['id' => $l->id]) }}">Detail </a>
                                    <i class='bx bx-sm bx-right-arrow-alt'></i>       
                                </div>
                              </div>
                             
                            <hr class="my-1" style="border: 2px solid black; opacity: 1">
  
                            <p class="mb-0 montserrat-light">
                                {{ $l->perusahaan->namaPerusahaan ?? 'Perusahaan tidak tersedia'}}
                            </p>

                            <ul class="roboto-light text-black mb-1 mt-2 w-100" style="font-size: 15px">
                                <li>
                                    {!! nl2br(e(Str::limit($l->deskripsiLowongan, 100, '...'))) !!}
                                </li>
                            </ul>  

                            
                            <div class="d-flex flex-row gap-2">
                                <div class="pills">{{ $l->perusahaan->lokasiPerusahaan ?? 'Lokasi  tidak ada' }}</div>
                                <div class="pills">{{ $l->jenisLowongan }}</div>
                                <div class="pills">{{ $->tipeLowongan }}</div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="load-more-container">
            <button class="load-more-btn">Muat Lebih Banyak</button>
        </div>
    </div>

    @include('components.footer')
@endsection