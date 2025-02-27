@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')

    <div class="main-content">
        <h1 class="fw-bold fst-italic mt-4 text-center">Tambah Pertanyaan</h1>

        <div class="d-flex justify-content-center mt-4">
            <!-- Container untuk Form -->
            <div id="form-container" style="width: 80%; max-width: 900px;">
                <div class="form-box p-4 rounded shadow-sm position-relative" style="background: white;">
                    <!-- Floating Button DI DALAM BOX -->
                    <div class="floating-menu d-flex justify-content-end">
                        <button class="btn floating-btn shadow-sm add-form mx-1" title="Tambah Pertanyaan">
                            <i class="bx bx-plus"></i>
                        </button>
                        <button class="btn floating-btn shadow-sm remove-form mx-1">
                            <i class="bx bx-minus"></i>
                        </button>
                        <button class="btn floating-btn shadow-sm mx-1">
                            <i class="bx bx-menu"></i>
                        </button>
                    </div>

                    <!-- Judul Form -->
                    <div class="mb-3">
                        <label class="fw-bold">Tambahkan Judul Form</label>
                        <input type="text" class="form-control custom-input" placeholder="Masukkan Judul Formulir">
                    </div>

                    <!-- Deskripsi Form -->
                    <div class="mb-3">
                        <label class="fw-bold">Tambahkan Deskripsi</label>
                        <input type="text" class="form-control custom-input" placeholder="Masukkan Deskripsi Formulir">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formContainer = document.getElementById("form-container");

            document.addEventListener("click", function(event) {
                if (event.target.closest(".add-form")) {
                    const formBox = document.querySelector(".form-box");
                    const newForm = formBox.cloneNode(true);
                    formContainer.appendChild(newForm);
                }

                if (event.target.closest(".remove-form")) {
                    const allForms = document.querySelectorAll(".form-box");
                    if (allForms.length > 1) {
                        allForms[allForms.length - 1].remove();
                    }
                }
            });
        });
    </script>
@endsection
