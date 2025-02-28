@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content">
  <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Edit Berita</h1>
  <div class="box-form">
    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      <div class="mb-3">
          <label for="judul_berita">Judul Berita</label>
          <input type="text" class="form-control" id="judul_berita" name="judul_berita"
              value="{{ old('judul_berita', $berita->judul_berita) }}" required>
      </div>

      <div class="mb-3">
          <label for="deskripsi_berita">Deskripsi Berita</label>
          <textarea class="form-control" id="deskripsi_berita" name="deskripsi_berita" rows="6" required>{{ old('deskripsi_berita', $berita->deskripsi_berita) }}</textarea>
      </div>

      <div class="mb-3">
        <label class="buttonUploadFile" for="gambar">
          <i class='bx bx-upload me-1'></i> Pilih Gambar
        </label>
        <input type="file" class="form-control" id="gambar" name="gambar[]" multiple accept="image/*">
        <div id="preview-container" class="mt-2"></div> <!-- Pratinjau gambar baru -->
      </div>

      <div class="mb-3">
        <label>Gambar Lama:</label>
        <div class="old-images">
            @if (!empty($berita->gambar))
    @php
        $gambarArray = is_array($berita->gambar) ? $berita->gambar : json_decode($berita->gambar, true);
    @endphp

    @if(is_array($gambarArray))
        @foreach ($gambarArray as $index => $file)
            <div id="lampiran-item-{{ $index }}" class="d-flex align-items-center mb-2">
                <img src="{{ asset('storage/' . $file) }}" alt="Gambar Berita" width="100" class="me-2">
                <label class="ms-2">
                    <input type="checkbox" name="hapus_gambar[]" value="{{ $file }}"> Hapus
                </label>
            </div>
        @endforeach
    @else
        <p>Tidak ada gambar</p>
    @endif
@else
    <p>Tidak ada gambar</p>
@endif

        </div>
      </div>

      <!-- Tombol Perbarui dan Batal -->
      <div class="d-flex gap-2">
        <button type="submit" class="btn" style="background-color: #13C56B; color: white; border: none;">
          Perbarui
        </button>
        <a href="{{ route('admin.berita.berita') }}" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>
</div>

<script>
  // Pratinjau gambar baru sebelum upload
  document.getElementById('gambar').addEventListener('change', function(event) {
      const container = document.getElementById('preview-container');
      container.innerHTML = ''; // Hapus pratinjau sebelumnya
      Array.from(event.target.files).forEach(file => {
          const reader = new FileReader();
          reader.onload = function(e) {
              const img = document.createElement('img');
              img.src = e.target.result;
              img.width = 100;
              img.classList.add('me-2', 'mb-2');
              container.appendChild(img);
          };
          reader.readAsDataURL(file);
      });
  });
</script>
@endsection
