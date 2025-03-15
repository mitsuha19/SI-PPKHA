@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-center" >
  <h1>Artikel</h1>

  <div class="d-flex flex-row justify-content-center gap-2 w-100 mb-3">
    <form class="w-50">
      <input type="text" id="artikel" name="artikel" value="Cari Artikel">
    </form>
    <div class="search-logo d-flex justify-content-center align-items-center" >
      <i class='bx bx-search-alt-2'></i>
    </div>
  </div>

  <div class="d-flex flex-column align-items-center w-100 gap-2">
    <div class="d-flex justify-content-end" style="width: 80%">
      <a href="" class="btn btn-primary">
        <i class='bx bx-plus-circle'></i> Tambah
      </a>
    </div>
    <div class="background-card">
      <div class="card-information d-flex align-items-center px-3">
        <img src="{{ asset('assets/images/image.png') }}">
        <div class="ps-3">
          {{-- Judul Artikel dan button Edit dan Delete --}}
          <div class="d-flex flex-md-row flex-sm-column w-auto justify-content-start align-items-end">
            <h2 class="fst-italic roboto-title mb-0 align-self-center">Ratusan Mahasiswa Indonesia Terima Mahasiswa </h2>
    
            {{-- Button --}}
            <div class="align-self-start">
              <div class="ms-auto d-flex gap-2">
                <button type="button" class="btn" onclick="">
                  <i class='bx bx-pencil'></i> 
                  <span class="d-none d-xl-inline ms-1">Edit</span>
                </button>
                
                <button type="button" class="btn" onclick="">
                  <i class='bx bx-trash'></i> <span class="d-none d-xl-inline">Hapus</span>
                </button>                      
              </div>
            </div>
          </div>

          <hr class="my-2 w-100" style="border: 3px solid black; opacity:1">
  
          <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
            204 Mahasiswa Menerima Beasiswa TELADAN. Beasiswa ini untuk menciptakan pemimpin-pemimpin masa depan yang dibekali dengan soft skills..
          </p>
    
          {{-- Link to detail news --}}
          <div class="detail">
            <a href="/admin/artikel/detail">
              Selengkapnya..
            </a>
          </div>
          
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
  
</div>
@endsection
