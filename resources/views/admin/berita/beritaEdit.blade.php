@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content">
  <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Edit Berita</h1>
  <div class="box-form">
      <form action="">
        <label for="judul" class="poppins-bold text-black mb-2">Judul Berita:</label>
        <input type="text" class="form-control mb-3" id="judul" placeholder="Masukkan judul Berita">
        <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Berita:</label>
        <textarea class="form-control mb-3" id="deskripsi" placeholder="Masukkan deskripsi Berita"></textarea>  
        <label for="myFile" class="form-label poppins-bold text-black mt-2">Tambahkan Gambar:</label>
        <div class="button-wrap">
          <label class="buttonUploadFile" for="upload">
            <i class='bx bx-upload me-1'></i>
            Choose a File
          </label>
          <input id="upload" type="file">
        </div>
        <div class="d-flex justify-content-end align-items-end gap-2">
          <button>Batal</button>
          <button>Edit</button>
        </div>
      </form>
  </div>
</div>
@endsection
