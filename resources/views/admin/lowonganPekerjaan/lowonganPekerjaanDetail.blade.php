@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-start gap-3" >
  <div class="card-lowongan d-flex flex-row align-items-center gap-5">
    <img style="height: 92px; width: auto;" src="{{ asset('assets/images/image2.png') }}">
    <div class="montserrat-medium mb-0">
      <h2>Norxel Teknologi Indonesia</h2>
      <p>Kota Semarang, Indonesia</p>
      <div class="d-flex flex-row" style="gap: 100px;">
        <p><span style="color: #656565;">Lokasi</span><br>KOTA JAKARTA UTARA</p>
        <p><span style="color: #656565;">Departemen</span><br>Administrasi</p>
        <p><span style="color: #656565;">Jenis-Pekerjaan</span><br>Full-Time</a></p>
      </div>
    </div>
  </div>

  <div class="card-lowongan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0 w-100">
      <h2 class="mb-0">Deskripsi Lowongan</h2>
      <hr style="opacity:1; margin: 10px 0px">
      <ul class="roboto-light text-black mb-1" style="font-size: 15px">
        <li>Membuat laporan dan report</li>
        <li>Menguasai microsoft excel dan microsoft word</li>
        <li>Melakukan filing dokumen</li>
        <li>Melakukan entry data</li>
        <li>Penjadwalan dan koordinasi</li>
        <li>Bantuan kepada staff</li>
      </ul>
    </div>
  </div>

  <div class="card-lowongan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0 w-100">
      <h2 class="mb-0">Kualifikasi</h2>
      <hr style="opacity:1; margin: 10px 0px">
      <ul class="roboto-light text-black mb-1" style="font-size: 15px">
        <li>Membuat laporan dan report</li>
        <li>Menguasai microsoft excel dan microsoft word</li>
        <li>Melakukan filing dokumen</li>
        <li>Melakukan entry data</li>
        <li>Penjadwalan dan koordinasi</li>
        <li>Bantuan kepada staff</li>
      </ul>
    </div>
  </div>

  <div class="card-lowongan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0 w-100">
      <h2 class="mb-0">Benefit</h2>
      <hr style="opacity:1; margin: 10px 0px">
      <p class="align-items-center">Belum ada benefit dari lowongan pekerjaan ini<p>
    </div>
  </div>

  <div class="card-lowongan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0 w-100 ">
      <h2 class="mb-0" >Keahlian</h2>
      <hr style="opacity:1; margin: 10px 0px">

      <div class="d-flex gap-2">
        <div class="pills" >Business Development</div>
        <div class="pills">Teamwork</div>
        <div class="pills">Management</div>
        <div class="pills">Office Administration</div>
        <div class="pills">Good Communication Skills</div>
      </div>
    </div>
  </div>

  <div class="align-self-end justify-self-end" style="margin-bottom: 100px">
    <a href="" class="btn btn-primary">Kembali</a>
</div>
@endsection
