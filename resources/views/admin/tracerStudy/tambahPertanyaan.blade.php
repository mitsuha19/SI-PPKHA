@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')

    <div class="main-content">
        <h1 class="fw-bold fst-italic mt-4 text-center">Tambah Pertanyaan</h1>

        <div class="d-flex justify-content-center mt-4">
            <!-- Form Container -->
            <div class="form-container p-4 rounded shadow-sm position-relative">
                <!-- Floating Button DI DALAM BOX -->
                <div class="floating-menu">
                    <button class="btn floating-btn shadow-sm" title="Tambah Pertanyaan">
                        <i class="bx bx-plus"></i>
                    </button>
                    <button class="btn floating-btn shadow-sm">
                        <i class="bx bx-minus"></i>
                    </button>
                    <button class="btn floating-btn shadow-sm">
                        <i class="bx bx-menu"></i>
                    </button>
                </div>

                <!-- Judul Form -->
                <div class="mb-3">
                    <label for="judulForm" class="fw-bold">Tambahkan Judul Form</label>
                    <input type="text" id="judulForm" class="form-control custom-input"
                        placeholder="Masukkan Judul Formulir">
                </div>

                <!-- Deskripsi Form -->
                <div class="mb-3">
                    <label for="deskripsiForm" class="fw-bold">Tambahkan Deskripsi</label>
                    <input type="text" id="deskripsiForm" class="form-control custom-input"
                        placeholder="Masukkan Deskripsi Formulir">
                </div>
            </div>
        </div>
    </div>
@endsection
