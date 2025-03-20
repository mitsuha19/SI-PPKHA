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
          <input id="upload" type="file" name="gambar[]" class="form-control d-none" multiple accept="image/*, .pdf, .doc, .docx, .xls, .xlsx" onchange="previewFiles()">
        </div>

        <div id="file-preview" class="mt-2"></div>

        <div class="d-flex justify-content-end align-items-end gap-2">
          <a href="{{ route('admin.artikel.artikel') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
  </div>
</div>

<script>
  function previewFiles() {
      let input = document.getElementById('upload');
      let preview = document.getElementById('file-preview');
      preview.innerHTML = ''; // Reset tampilan sebelumnya

      if (input.files.length > 0) {
          for (let i = 0; i < input.files.length; i++) {
              let file = input.files[i];
              let fileReader = new FileReader();

              fileReader.onload = function (e) {
                  let fileType = file.type.split('/')[0]; // Cek tipe file
                  let fileDisplay = document.createElement('div');
                  fileDisplay.classList.add('mb-2');

                  if (fileType === 'image') {
                      fileDisplay.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-thumbnail" width="100">`;
                  } else {
                      fileDisplay.innerHTML = `<p>${file.name}</p>`;
                  }

                  preview.appendChild(fileDisplay);
              };

              fileReader.readAsDataURL(file);
          }
      }
  }
</script>
@endsection
