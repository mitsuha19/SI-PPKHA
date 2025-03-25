@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content">
        <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Edit Pengumuman</h1>
        <div class="box-form">
            <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Input Judul --}}
                <label for="judul" class="poppins-bold text-black mb-2">Judul Pengumuman:</label>
                <input type="text" class="form-control mb-3" id="judul" name="judul_pengumuman"
                    value="{{ $pengumuman->judul_pengumuman }}" placeholder="Masukkan judul Pengumuman" required>

                {{-- Input Deskripsi --}}
                <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Pengumuman:</label>
                <textarea class="form-control mb-3" id="deskripsi" name="deskripsi_pengumuman"
                    placeholder="Masukkan deskripsi Pengumuman" required>{{ $pengumuman->deskripsi_pengumuman }}</textarea>

                {{-- Upload Lampiran --}}
                <label for="myFile" class="form-label poppins-bold text-black mt-2">Tambahkan Lampiran:</label>
                <div class="button-wrap">
                    <label class="buttonUploadFile" for="upload">
                        <i class='bx bx-upload me-1'></i>
                        Choose File
                    </label>
                    <input id="upload" type="file" name="lampiran[]" multiple>
                </div>

                {{-- Menampilkan Lampiran yang Sudah Ada --}}
                @if (!empty($pengumuman->lampiran))
                    <div class="mt-3">
                        <p class="poppins-bold text-black" style="font-size: 14px;">Lampiran Saat Ini:</p>
                        <ul id="lampiran-list" style="list-style: none; padding: 0;">
                            @foreach (json_decode($pengumuman->lampiran, true) as $lampiran)
                                <li id="lampiran-{{ md5($lampiran) }}"
                                    style="display: flex; align-items: center; gap: 8px; font-size: 12px; margin-bottom: 3px;">

                                    {{-- Link Lampiran --}}
                                    <a href="{{ asset('storage/' . $lampiran) }}" target="_blank"
                                        style="text-decoration: none; color: blue; font-size: 12px;">
                                        {{ basename($lampiran) }}
                                    </a>

                                    {{-- Tombol Hapus (❌) --}}
                                    <button type="button" class="remove-lampiran" data-file="{{ $lampiran }}"
                                        data-target="lampiran-{{ md5($lampiran) }}"
                                        style="background: none; border: none; color: red; font-size: 10px; padding: 2px; margin: 0; width: 15px; height: 15px; line-height: 1; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                        ❌
                                    </button>

                                    {{-- Input Hidden untuk Menghapus Lampiran --}}
                                    <input type="hidden" name="hapus_lampiran[]" value=""
                                        class="hapus-lampiran-input">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Tombol Batal & Edit --}}
                <div class="d-flex justify-content-end align-items-end gap-2 mt-3">
                    {{-- Tombol Batal --}}
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>

                    {{-- Tombol Edit --}}
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
            document.querySelectorAll(".remove-lampiran").forEach(button => {
                button.addEventListener("click", function() {
                    let file = this.getAttribute("data-file");
                    let targetId = this.getAttribute("data-target");
                    document.getElementById(targetId).remove();

                    let hiddenInput = document.createElement("input");
                    hiddenInput.type = "hidden";
                    hiddenInput.name = "hapus_lampiran[]";
                    hiddenInput.value = file;
                    document.querySelector("form").appendChild(hiddenInput);
                });
            });
        });
    </script>
@endsection
