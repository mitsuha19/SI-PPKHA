@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <style>

        /* Responsive */
        @media (max-width: 768px) {
            .card-information {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .card-img-top {
                width: 100%;
                height: auto;
                margin-bottom: 1rem;
            }

            .top-search-bar-container {
                padding: 0.5rem;
            }

            .top-search-bar {
                flex-direction: column;
                gap: 0.5rem;
            }

            .top-search-bar input,
            .top-search-bar button {
                width: 100%;
            }

            

            .roboto-title {
                font-size: 1.2rem;
                text-align: center;
            }

            .roboto-light {
                font-size: 14px;
                text-align: justify;
            }

            .detail {
                text-align: right;
                width: 100%;
            }
        }
    </style>

    <div class="content-with-background d-flex flex-column align-items-center">
        @include('components.bg') <!-- Renders the background waves -->

        <!-- Top Search Bar Section -->
       <div class="top-search-bar d-flex align-items-center">
    <form class="d-flex w-100 gap-2" action="{{ route('ppkha.berita') }}" method="GET">
        <input type="text" id="berita" name="search" class="form-control flex-grow-1"
            placeholder="Cari Berita..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary px-2 py-1 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <i class='bx bx-search'></i>
        </button>
    </form>
</div>


        <!-- Berita Section -->
        @foreach ($berita as $item)
            <div class="background-card">
                <div class="card-information d-flex align-items-center px-3">
                    {{-- Ambil gambar pertama jika tersedia --}}
                    @php
                        $gambarArray = $item->gambar ?? [];
                    @endphp

                    @if (!empty($gambarArray) && isset($gambarArray[0]))
                        <img class="card-img-top" style="width: 100px" src="{{ asset($gambarArray[0]) }}" alt="Gambar Berita">
                    @else
                        <img class="card-img-top" src="{{ asset('assets/images/image.png') }}" alt="Default Gambar">
                    @endif

                    <div class="ps-3 w-100">
                        {{-- Judul Berita --}}
                        <div class="d-flex flex-md-row flex-sm-column w-auto justify-content-start align-items-end">
                            <h2 class="fst-italic roboto-title mb-0 align-self-center">
                                {{ $item->judul_berita }}
                            </h2>
                        </div>

                        <hr class="my-2 w-100" style="border: 2px solid black; opacity:1">

                        {{-- Deskripsi Berita --}}
                        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
                            {{ Str::limit($item->deskripsi_berita, 200, '...') }}
                        </p>

                        {{-- Link ke Detail Berita --}}
                        <div class="detail">
                            <a href="{{ route('ppkha.detailBerita', ['id' => $item->id]) }}">Selengkapnya..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            {{ $berita->appends(request()->query())->links() }}
        </div>
    </div>

    @include('components.footer')
@endsection
