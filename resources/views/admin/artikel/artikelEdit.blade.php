@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content">
  <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Edit Artikel</h1>
  <div class="box-form">
      <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @method('PUT')
        <label for="judul" class="poppins-bold text-black mb-2">Judul Artikel:</label>
        <input type="text" class="form-control mb-3" id="judul" name="judul_artikel"
        value="{{ $artikel->judul_artikel }}" placeholder="Masukkan judul Artikel" required>

        <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Artikel:</label>
        <textarea class="form-control mb-3" id="deskripsi" name="deskripsi_artikel"
        placeholder="Masukkan deskripsi Artikel" required>
          {{ $artikel->deskripsi_artikel }}
        </textarea>  
        <label for="myFile" class="form-label poppins-bold text-black mt-2">Tambahkan Gambar:</label>
        <div class="button-wrap">
          <label class="buttonUploadFile" for="upload">
            <i class='bx bx-upload me-1'></i>
            Choose a File
          </label>
          <input id="upload" type="file" name="gambar[]" multiple>
        </div>

        {{-- Menampilkan Gambar yang Sudah Ada --}}
        @if (!empty($artikel->gambar))
        <div class="mt-3">
            <p class="poppins-bold text-black" style="font-size: 14px;">Lampiran Saat Ini:</p>
            <ul id="gambar-list" style="list-style: none; padding: 0;">
                @foreach (json_decode($artikel->gambar, true) as $gambar)
                    <li id="gambar-{{ md5($gambar) }}"
                        style="display: flex; align-items: center; gap: 8px; font-size: 12px; margin-bottom: 3px;">

                        {{-- Link Lampiran --}}
                        <a href="{{ asset('storage/' . $gambar) }}" target="_blank"
                            style="text-decoration: none; color: blue; font-size: 12px;">
                            {{ basename($gambar) }}
                        </a>

                        {{-- Tombol Hapus (❌) --}}
                        <button type="button" class="remove-gambar" data-file="{{ $gambar }}"
                            data-target="gambar-{{ md5($gambar) }}"
                            style="background: none; border: none; color: red; font-size: 10px; padding: 2px; margin: 0; width: 15px; height: 15px; line-height: 1; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            ❌
                        </button>

                        {{-- Input Hidden untuk Menghapus Lampiran --}}
                        <input type="hidden" name="hapus_gambar[]" value=""
                            class="hapus-gambar-input">
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="d-flex justify-content-end align-items-end gap-2">
          <a href="{{ route('admin.artikel.artikel') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Auto scroll ke bawah saat halaman dimuat
      window.scrollTo(0, document.body.scrollHeight);

      // Fungsi untuk menghapus lampiran
      document.querySelectorAll(".remove-gambar").forEach(button => {
          button.addEventListener("click", function() {
              let file = this.getAttribute("data-file");
              let targetId = this.getAttribute("data-target");
              document.getElementById(targetId).remove();

              let hiddenInput = document.createElement("input");
              hiddenInput.type = "hidden";
              hiddenInput.name = "hapus_gambar[]";
              hiddenInput.value = file;
              document.querySelector("form").appendChild(hiddenInput);
          });
      });
  });
</script>
@endsection
