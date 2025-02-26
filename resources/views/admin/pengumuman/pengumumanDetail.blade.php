@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content d-flex flex-column align-items-center" >
  <h1>Pengumuman</h1>

  <div class="background-card" style="margin-bottom:100px">
    <div class="card-pengumuman d-flex align-items-center px-3">
      <div class="ps-3">
        {{-- Judul Pengumuman dan button Edit dan Delete --}}
        <div class="d-flex flex-row w-auto justify-content-start align-items-enc">
          <h2 class="fst-italic roboto-title mb-0 align-self-center" style="width: 80%;">
            Ratusan Mahasiswa Indonesia Terima Mahasiswa 
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

        <hr class="my-2" style="border: 1.5px solid black; opacity : 1;" >

        <div class="d-flex justify-content-center">
          <img style="width: 365px" src="{{ asset('assets/images/image.png') }}">
        </div>

        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
          deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing 
          elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
          veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
          mollit anim id est laborum.
        </p>
  
        {{-- Link to detail news --}}
        <div class="detail">
          <button type="button" class="btn px-3">
            Tutup
          </button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
@endsection
