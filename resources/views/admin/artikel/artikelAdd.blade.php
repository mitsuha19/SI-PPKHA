@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content">
  <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Tambah Artikel</h1>
  <div class="box-form">
      <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="judul" class="poppins-bold text-black mb-2">Judul Artikel:</label>
        <input type="text" class="form-control mb-3" id="judul" name="judul_artikel" placeholder="Masukkan judul Artikel" required>

        <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Artikel:</label>
        <textarea class="form-control mb-3" id="deskripsi" name="deskripsi_artikel" placeholder="Masukkan deskripsi Artikel"></textarea>

        <label for="upload" class="form-label poppins-bold text-black mt-2">Tambahkan Gambar:</label>
        <div class="button-wrap">
          <label class="buttonUploadFile" for="upload">
            <i class='bx bx-upload me-1'></i>
            Choose a File
          </label>
          <input id="upload" type="file" name="gambar[]" multiple
                        accept="image/*, .pdf, .doc, .docx, .xls, .xlsx" onchange="previewFiles()">
        </div>

        <div id="preview-container" class="mt-3" style="max-height: 200px; overflow-y: auto;"></div>

        <div class="d-flex justify-content-end align-items-end gap-2">
          <a href="{{ route('admin.artikel.artikel') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
  </div>
</div>
@endsection
