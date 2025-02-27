@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content text-center">
        <h1 class="fw-bold fst-italic mt-4">Tracer Study</h1>
        <h2 class="fw-bold mt-3 text-dark">Belum ada Form Pertanyaan yang di buat!</h2>

        <a href="/admin/tracer-study/create" class="tambah-btn">
            <span class="icon-box"><i class="bx bx-plus"></i></span> <span class="fw-bold fst-italic">Tambah</span>
        </a>
    </div>
@endsection
