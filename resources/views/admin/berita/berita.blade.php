@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column  align-items-center" >
  <h1>Berita</h1>

  <div class="d-flex flex-row gap-2 mb-4">
    <form>
      <input type="text" id="berita" name="berita" value="Cari Berita">
    </form>
    <div class="search-logo d-flex justify-content-center align-items-center" >
      <i class='bx bx-search-alt-2'></i>
    </div>
  </div>

  @foreach ($berita as $item)
  <div class="background-card">
      <div class="card-berita d-flex align-items-center px-3">
          {{-- Ambil gambar pertama jika tersedia --}}
          @php
              $gambarArray = $item->gambar ?? []; // Laravel otomatis mengubah JSON ke array
          @endphp
  
  @if (!empty($gambarArray) && isset($gambarArray[0]))
  <img style="width: 151px; height: 100px; object-fit: contain; border-radius: 8px;" 
       src="{{ asset('storage/' . $gambarArray[0]) }}" 
       alt="Gambar Berita">
@else
  <img style="width: 151px; height: 100px; object-fit: contain; border-radius: 8px; background-color: #f0f0f0;" 
       src="{{ asset('assets/images/image.png') }}" 
       alt="Default Gambar">
@endif

  
          <div class="ps-3">
              {{-- Judul Berita --}}
              <div class="d-flex flex-row w-auto justify-content-start align-items-center">
                  <h2 class="fst-italic roboto-title mb-0 align-self-center" style="margin-right: 90px">
                      {{ $item->judul_berita }}
                  </h2>
              </div>
  
              <hr class="my-2" style="border: 3px solid black;">
  
              {{-- Deskripsi Berita --}}
              <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
                  {{ Str::limit($item->deskripsi_berita, 100, '...') }}
              </p>
  
              {{-- Link ke Detail Berita --}}
              <div class="detail">
                  <a href="{{ route('admin.berita.berita', $item->id) }}">
                      Selengkapnya..
                  </a>
              </div>
          </div>
      </div>
  </div>
  @endforeach


  <div class="background-card">
    <div class="card-berita d-flex align-items-center px-3">
      <img style="width: 151px" src="{{ asset('assets/images/image.png') }}">
      <div class="ps-3">
        {{-- Judul Berita dan button Edit dan Delete --}}
        <div class="d-flex flex-row w-auto justify-content-start align-items-enc">
          <h2 class="fst-italic roboto-title mb-0 align-self-center">Ratusan Mahasiswa Indonesia Terima Mahasiswa </h2>
  
          {{-- Button --}}
          <div class="align-self-start">
            <button type="button" class="btn">
              <i class='bx bx-pencil'></i>
              Edit
            </button>
            <button type="button" class="btn">
              <i class='bx bx-trash' ></i>
              Hapus
            </button>
          </div>
        </div>

        <hr class="my-2" style="border: 2px solid black; opacity: 1">
  
        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
          204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills..
        </p>
  
        {{-- Link to detail news --}}
        <div class="detail">
          <a href="/admin/berita/detail">
            Selengkapnya..
          </a>
        </div>
        
      </div>
    </div>
  </div>
  
  <div class="pagination">
    <a href="#" style="background-color: transparent">&laquo;</a>
    <a class="active" href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">...</a>
    <a href="#" style="background-color: transparent">&raquo;</a>
  </div>

  <div class="align-self-end justify-self-end" style="margin-bottom: 100px">
    <a href="{{ route('admin.berita.add') }}" class="btn btn-primary">
      <i class='bx bx-plus-circle'></i> Tambah
  </a>

  </div>
  
</div>
@endsection
