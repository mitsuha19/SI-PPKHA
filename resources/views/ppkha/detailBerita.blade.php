@extends('layouts.app')

@section('content')
@include('components.navbar')
<div class="detail-content">
  <div>
    <h1 class="roboto-light mb-0" style="font-style: italic; color: #0F1035; font-weight: 500; font-size: 45px;">
      {{ $berita->judul_berita }}
    </h1>
    <hr>
    <p style = "font-family: 'Roboto Mono', serif ; font-size : 18px; font-weight: 400; color: white" class="mb-1">Selasa, 18 Feb 2025 07:00 WIB</p>
  </div>
  <div class="max-width d-flex justify-content-center">
    @php
      // Pastikan $berita->gambar adalah string sebelum di-decode
      $gambarArray = is_string($berita->gambar) ? json_decode($berita->gambar, true) : $berita->gambar;
      $gambarArray = is_array($gambarArray) ? $gambarArray : [];
    @endphp
    @if (!empty($gambarArray) && isset($gambarArray[0]))
      <img src="{{ asset('storage/' . $gambarArray[0]) }}">
    @else
      <img src="{{ asset('assets/images/image.png') }}">
    @endif
  </div>
  <div class="p-4">
    <p style="font-family: 'Roboto Mono', serif; line-height: 45px; font-weight: 500; color: white; text-indent: 0.5in;">     
      {{ $berita->deskripsi_berita }}
    </p>
  </div>
</div>
@include('components.footer')
@endsection
