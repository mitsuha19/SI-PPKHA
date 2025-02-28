@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-center" >
  <h1>Daftar Perusahaan</h1>

  <div class="d-flex flex-row gap-2 mb-4">
    <form>
      <input type="text" id="berita" name="berita" value="Cari Berita">
    </form>
    <div class="search-logo d-flex justify-content-center align-items-center" >
      <i class='bx bx-search-alt-2'></i>
    </div>
  </div>

  <div class="background-card">
    <div class="card-berita d-flex align-items-center px-3">
      <img style="width: 130px" src="{{ asset('assets/images/image2.png') }}">
      <div class="ps-3">
        {{-- Judul Berita dan button Edit dan Delete --}}
        <div class="d-flex flex-row w-auto justify-content-start align-items-enc">
          <h2 class="fst-italic roboto-title mb-0 align-self-center">
            Norxel Teknologi Indonesia
          </h2>
  
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
  
        <div class="d-flex flex-row align-items-center" style="gap: 5px">
          <p class="mb-0 montserrat-light">Kota Semarang</p>
          <div class="circle"></div>
          <p class="mb-0 montserrat-medium">Industri Perbankan</p>
        </div>
        
        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
          PT Norxel Teknologi Indonesia adalah perusahaan manufaktur yang bergerak di bidang pembuatan mesin perbankan. Kami berkomitmen untuk terus berinovasi dalam menyediakan solusi teknologi yang andal bagi industri perbankan.
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


  <div class="background-card">
    <div class="card-berita d-flex align-items-center px-3">
      <img style="width: 130px" src="{{ asset('assets/images/image2.png') }}">
      <div class="ps-3">
        {{-- Judul Berita dan button Edit dan Delete --}}
        <div class="d-flex flex-row w-auto justify-content-start align-items-enc">
          <h2 class="fst-italic roboto-title mb-0 align-self-center">
            Norxel Teknologi Indonesia
          </h2>
  
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
  
        <div class="d-flex flex-row align-items-center" style="gap: 5px">
          <p class="mb-0 montserrat-light">Kota Semarang</p>
          <div class="circle"></div>
          <p class="mb-0 montserrat-medium">Industri Perbankan</p>
        </div>
        
        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
          PT Norxel Teknologi Indonesia adalah perusahaan manufaktur yang bergerak di bidang pembuatan mesin perbankan. Kami berkomitmen untuk terus berinovasi dalam menyediakan solusi teknologi yang andal bagi industri perbankan.
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
    <button type="button" class="btn">
      <i class='bx bx-plus-circle' ></i>
      Tambah
    </button>
  </div>
  
</div>
@endsection
