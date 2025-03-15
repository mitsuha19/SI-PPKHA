@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-start gap-3" >
  <div class="card-perusahaan d-flex flex-row align-items-center gap-5">
    <img style="height: 92px; width: auto;" src="{{ asset('assets/images/image2.png') }}">
    <div class="montserrat-medium mb-0">
      <h2>Norxel Teknologi Indonesia</h2>
      <p>Kota Semarang, Indonesia</p>
      <div class="d-flex flex-md-row flex-sm-column" style="gap: 100px;">
        <p><span style="color: #656565;">Industri</span><br>Industri Perbankan</p>
        <p><span style="color: #656565;">Website</span><br><a>https://norxel.com/</a></p>
      </div>
    </div>
  </div>

  <div class="card-perusahaan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0">
      <h2 class="mb-0">Tentang Kami</h2>
      <hr style="opacity:1; margin: 10px 0px">
      <p>
        PT Norxel Teknologi Indonesia adalah perusahaan manufaktur 
        yang bergerak di bidang pembuatan mesin perbankan. Kami 
        berkomitmen untuk terus berinovasi dalam menyediakan solusi 
        teknologi yang andal bagi industri perbankan.
      </p>
    </div>
  </div>
  

  <div class="card-perusahaan-about d-flex flex-row align-items-center gap-5">
    <div class="montserrat-medium mb-0 w-100 ">
      <h2 class="mb-0" >Lowongan</h2>
      <hr style="opacity:1; margin: 10px 0px">

      <div class="mb-2">
        <div class="d-flex flex-row mb-3">
          <img style="width: 100px;" src="{{ asset('assets/images/image2.png') }}">
          <div class="d-flex flex-column">
            <h3 class="mb-0 ps-3">General Admin Staff</h3>
            <ul class="roboto-light text-black mb-1 style="font-size: 15px">
              <li>Membuat Laporan dan report</li>
              <li>Menguasai microsoft excel dan microsoft word...</li>
            </ul>
          </div>
        </div>
        <div class="d-flex flex-row gap-2 flex-wrap">
          <div class="pills" >KOTA JAKARTA UTARA</div>
          <div class="pills">Administrasi</div>
          <div class="pills">Full-Time</div>
        </div>
      </div>

      <hr style="opacity:1; margin: 10px 0px">

      <div class="mb-2">
        <div class="d-flex flex-row mb-3">
          <img style="width: 100px;" src="{{ asset('assets/images/image2.png') }}">
          <div class="d-flex flex-column">
            <h3 class="mb-0 ps-3">General Admin Staff</h3>
            <ul class="roboto-light text-black mb-1 style="font-size: 15px">
              <li>Membuat Laporan dan report</li>
              <li>Menguasai microsoft excel dan microsoft word...</li>
            </ul>
          </div>
        </div>
        <div class="d-flex flex-row gap-2">
          <div class="pills" >KOTA JAKARTA UTARA</div>
          <div class="pills">Administrasi</div>
          <div class="pills">Full-Time</div>
        </div>
      </div>

      <hr style="opacity:1; margin: 10px 0px">

      <div class="mb-2">
        <div class="d-flex flex-row mb-3">
          <img style="width: 100px;" src="{{ asset('assets/images/image2.png') }}">
          <div class="d-flex flex-column">
            <h3 class="mb-0 ps-3">General Admin Staff</h3>
            <ul class="roboto-light text-black mb-1 style="font-size: 15px">
              <li>Membuat Laporan dan report</li>
              <li>Menguasai microsoft excel dan microsoft word...</li>
            </ul>
          </div>
        </div>
        <div class="d-flex flex-row gap-2">
          <div class="pills" >KOTA JAKARTA UTARA</div>
          <div class="pills">Administrasi</div>
          <div class="pills">Full-Time</div>
        </div>
      </div>
      
    </div>
  </div>

  <div class="align-self-end justify-self-end" style="margin-bottom: 100px">
    <a href="" class="btn btn-primary">Kembali</a>
</div>
@endsection
