@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <style>

        @media (max-width: 768px) {
            .card-information {
                flex-direction: column;
                text-align: center;
            }

            .card-information img {
                max-width: 100%;
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
        }
    </style>

    <div class="content-with-background d-flex flex-column align-items-center">
        @include('components.bg')

        <!-- Top Search Bar Section -->
       <div class="top-search-bar d-flex align-items-center">
    <form class="d-flex w-100 gap-2" action="{{ route('ppkha.pengumuman') }}" method="GET">
        <input type="text" id="pengumuman" name="search" class="form-control flex-grow-1"
            placeholder="Cari Pengumuman..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary px-2 py-1 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <i class='bx bx-search'></i>
        </button>
    </form>
</div>

        <!-- Pengumuman Section -->
        @foreach ($pengumuman as $item)
            <div class="background-card">
                <div class="card-information">
                    @php
                        $gambarArray = $item->gambar ?? [];
                    @endphp

                    <div class="image-container">
                        @if (!empty($gambarArray) && isset($gambarArray[0]))
                            <img src="{{ asset($gambarArray[0]) }}" alt="Gambar Pengumuman">
                        @else
                            <img src="{{ asset('assets/images/image.png') }}" alt="Default Gambar">
                        @endif
                    </div>

                    <div class="text-container w-100">
                        <h5>{{ $item->judul_pengumuman }}</h5>
                        <hr class="my-2" style="border: 2px solid black; opacity: 1">
                        <p style="font-size: 15px;">
                            {{ Str::limit($item->deskripsi_pengumuman, 200, '...') }}
                        </p>
                        <div class="detail mt-2">
                            <a href="{{ route('ppkha.pengumumanDetail', ['id' => $item->id]) }}">Selengkapnya..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="pagination my-3">
            {{ $pengumuman->appends(request()->query())->links() }}
        </div>
    </div>

    @include('components.footer')
@endsection
