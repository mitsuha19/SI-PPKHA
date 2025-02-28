@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-wrapper">
        <div class="main-content overflow-auto">
            <h1 class="fw-bold fst-italic mt-4 text-center">Form Builder</h1>

            <div id="form-sections" class="space-y-6 flex flex-col items-center">
                <!-- Contoh Section Tanpa Pertanyaan Awal -->
                <div class="section-container bg-white p-6 rounded-lg shadow-md relative w-full max-w-2xl">
                    <!-- Tombol Hapus Section -->
                    <button class="absolute top-2 right-2 text-red-500 text-lg remove-section">&times;</button>

                    <div class="mb-4">
                        <input type="text" class="form-control text-lg font-semibold border-b w-full focus:outline-none"
                            placeholder="Bagian Tanpa Judul">
                        <input type="text"
                            class="form-control text-sm text-gray-600 border-b w-full mt-1 focus:outline-none"
                            placeholder="Deskripsi (Opsional)">
                    </div>

                    <!-- Container Pertanyaan yang Kosong -->
                    <div class="questions space-y-4"></div>

                    <!-- Floating Button -->
                    <div class="floating-menu">
                        <button class="floating-btn bg-blue-500 hover:bg-blue-600 add-question" title="Tambah Pertanyaan">
                            <i class="bx bx-plus"></i>
                        </button>
                        <button class="floating-btn bg-blue-500 hover:bg-blue-600 add-section" title="Tambah Section">
                            <i class="bx bx-list-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
