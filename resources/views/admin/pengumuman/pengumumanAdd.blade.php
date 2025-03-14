@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')

    <div class="main-content">
        <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Tambah Pengumuman</h1>

        <div class="box-form">
            <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="judul" class="poppins-bold text-black mb-2">Judul Pengumuman:</label>
                <input type="text" class="form-control mb-3" id="judul" name="judul_pengumuman"
                    placeholder="Masukkan judul Pengumuman" required>

                <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Isi Pengumuman:</label>
                <textarea class="form-control mb-3" id="deskripsi" name="deskripsi_pengumuman"
                    placeholder="Masukkan deskripsi Pengumuman" required></textarea>

                <label for="upload" class="form-label poppins-bold text-black mt-2">Lampiran:</label>
                <div class="button-wrap">
                    <label class="buttonUploadFile" for="upload">
                        <i class='bx bx-upload me-1'></i>
                        Pilih File
                    </label>
                    <input id="upload" type="file" name="lampiran[]" multiple onchange="previewFiles()">
                </div>

                <!-- Preview Lampiran -->
                <div id="preview-container" class="mt-3"></div>

                <div class="d-flex justify-content-end align-items-end gap-2 mt-3">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function previewFiles() {
            const previewContainer = document.getElementById("preview-container");
            previewContainer.innerHTML = ""; // Kosongkan preview saat pengguna memilih file baru
            const files = document.getElementById("upload").files;

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        if (file.type.startsWith("image/")) {
                            // Jika file adalah gambar, tampilkan sebagai gambar
                            const imgElement = document.createElement("img");
                            imgElement.src = e.target.result;
                            imgElement.style.width = "100px";
                            imgElement.style.height = "100px";
                            imgElement.style.objectFit = "cover";
                            imgElement.style.marginRight = "10px";
                            imgElement.style.borderRadius = "5px";
                            previewContainer.appendChild(imgElement);
                        } else {
                            // Jika file bukan gambar, tampilkan sebagai daftar file
                            const fileElement = document.createElement("p");
                            fileElement.textContent = file.name;
                            fileElement.style.marginBottom = "5px";
                            previewContainer.appendChild(fileElement);
                        }
                    };

                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
@endsection
