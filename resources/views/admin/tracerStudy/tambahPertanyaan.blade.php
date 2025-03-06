@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-wrapper">
        <div class="main-content overflow-auto">
            <h1 class="fw-bold fst-italic mt-4 text-center">Form Builder</h1>

            <div id="form-sections" class="space-y-6 flex flex-col items-center">
                <!-- Contoh Section Tanpa Pertanyaan Awal -->
                <div class="section-container p-6 rounded-lg shadow-md relative w-full max-w-2xl gap-5">
                    <!-- Tombol Hapus Section -->
                    <button class="absolute top-2 right-2 text-red-500 text-lg remove-section">&times;</button>

                    <div class="d-flex flex-row pe-4 section-container-main">
                        <div class="mb-4 d-flex flex-column me-3" style="width: 95%">
                            <label for="judul" class="text-black">Tambahkan Judul Form</label>
                            <input type="text"
                                class=" mb-3 bg-white text-lg font-semibold border-b w-100 focus:outline-none"
                                id="judul" placeholder="Masukkan Judul Formulir">
                            <label for="judul" class="text-black">Tambahkan Deskripsi</label>
                            <input type="text"
                                class="mb-3 bg-white text-lg font-semibold border-b w-100 focus:outline-none" id="deskripsi"
                                placeholder="Masukkan Deskripsi Formulir">
                        </div>

                        <!-- Floating Button -->
                        <div class="floating-menu gap-3 py-3">
                            <button class="floating-btn add-question" title="Tambah Pertanyaan">
                                <i class="bx bx-plus bx-sm"></i>
                            </button>
                            <button class="floating-btn add-section" title="Tambah Section">
                                <i class="bx bx-list-plus bx-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Container Pertanyaan yang Kosong -->
                    <div class="questions space-y-4"></div>

                </div>
            </div>
            <div class="text-center mt-3 save-button-container">
                <button id="save-form" class="btn btn-primary">Simpan Form</button>
            </div>

        </div>
    </div>
@endsection
