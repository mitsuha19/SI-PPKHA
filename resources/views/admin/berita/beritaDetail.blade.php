@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-center">
  <h1>Berita</h1>

  <div class="background-card" style="margin-bottom:100px">
    <div class="card-information d-flex align-items-center px-3">
      <div class="ps-3 w-100">
        {{-- Judul Berita dan button Edit dan Delete --}}
        <div class="d-flex flex-md-row flex-sm-column w-auto justify-content-start align-items-center">
          <h2 class="fst-italic roboto-title mb-0 align-self-center">
            {{ $berita->judul_berita }}
          </h2>
  
          {{-- Button --}}
          <div class="align-self-start">
            <a href="{{ route('admin.berita.beritaEdit', ['id' => $berita->id]) }}" class="btn">
              <i class='bx bx-pencil'></i> 
              <span class="d-none d-xl-inline ms-1">Edit</span>
            </a>
            <form action="{{ route('admin.berita.destroy', ['id' => $berita->id]) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn" onclick="return confirm('Yakin ingin menghapus berita ini?');">
                <i class='bx bx-trash'></i>
                <span class="d-none d-xl-inline ms-1">Hapus</span>
              </button>
            </form>
          </div>
        </div>

        <hr class="my-2" style="border: 1.5px solid black; opacity : 1;">

        {{-- Gambar --}}
        <div class="d-flex justify-content-center">
          @php
              // Pastikan $berita->gambar adalah string sebelum di-decode
              $gambarArray = is_string($berita->gambar) ? json_decode($berita->gambar, true) : $berita->gambar;
              $gambarArray = is_array($gambarArray) ? $gambarArray : [];
          @endphp
          @if (!empty($gambarArray) && isset($gambarArray[0]))
              <img style="width: 80%" src="{{ asset('storage/' . $gambarArray[0]) }}">
          @else
              <img style="width: 80%" src="{{ asset('assets/images/image.png') }}">
          @endif
        </div>

        {{-- Deskripsi --}}
        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
          {{ $berita->deskripsi_berita }}
        </p>

        {{-- Link ke berita --}}
        <div class="detail">
          <a href="{{ route('admin.berita.berita') }}" class="btn px-3">Tutup</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
