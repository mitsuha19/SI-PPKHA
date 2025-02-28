@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-start" >
  <div class="card-perusahaan d-flex flex-row align-items-center gap-5">
    <img style="height: 92px; width: auto;" src="{{ asset('assets/images/image2.png') }}">
    <div class="montserrat-medium mb-0">
      <h2 style="font-weight: 700">Norxel Teknologi Indonesia</h2>
      <p>Kota Semarang, Indonesia</p>
      <div class="d-flex flex-row" style="gap: 100px;">
        <p><span style="color: #656565;">Industri</span><br>Industri Perbankan</p>
        <p><span style="color: #656565;">Website</span><br><a>https://norxel.com/</a></p>
      </div>
    </div>
  </div>
</div>
@endsection
