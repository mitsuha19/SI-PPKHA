@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <style>

.search-form {
    max-width: 400px;
    width: 100%;
    margin: 0 auto;
}
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

    <div class="content-with-background">
        @include('components.bg')

        <!-- Top Search Bar Section (New, positioned at the top of content) -->
        <div class="top-search-bar d-flex align-items-center">
    <form class="d-flex gap-2 search-form" action="{{ route('ppkha.artikel') }}" method="GET">
        <input type="text" id="berita" name="search" class="form-control flex-grow-1"
            placeholder="Cari Artikel..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary px-2 py-1 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <i class='bx bx-search'></i>
        </button>
    </form>
</div>
        <div class="pengumuman-section d-flex flex-column align-items-center gap-4">
            <div class="berita-grid" style="display: flex; flex-wrap: wrap;">
                <!-- Static Cards -->

                @foreach ($artikel as $item)
                    <div class="bg-card p-0">
                        <div class="card h-100" style="width: 18rem;">
                            @php
                                $gambarArray = $item->gambar ?? []; // Laravel otomatis mengubah JSON ke array
                            @endphp

                            @if (!empty($gambarArray) && isset($gambarArray[0]))
                                <img class="card-img-top" src="{{ asset($gambarArray[0]) }}" alt="Gambar Artikel">
                            @else
                                <img class="card-img-top" src="{{ asset('assets/images/image.png') }}" alt="Default Gambar">
                            @endif

                            <div class="card-detail">
                                <h5 class="card-title">
                                    {{ $item->judul_artikel }}
                                </h5>
                                <div class="d-flex justify-content-end mt-4">
                                    <a href="{{ route('ppkha.detailArtikel', ['id' => $item->id]) }}">Selengkapnya..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="">
                {{ $artikel->appends(request()->query())->links() }}
            </div>
        </div>

    </div>


    @include('components.footer')
@endsection
