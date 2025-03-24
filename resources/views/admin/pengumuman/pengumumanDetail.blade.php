@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')

    <div class="main-content d-flex flex-column align-items-center">
        <h1>Pengumuman</h1>

        <div class="background-card" style="margin-bottom:100px">
            <div class="card-information d-flex align-items-center px-3">
                <div class="ps-3 w-100">
                    {{-- Judul Pengumuman dan tombol Edit & Hapus --}}
                    <div class="d-flex flex-md-row flex-sm-column w-auto justify-content-start align-items-center">
                        <h2 class="fst-italic roboto-title mb-0 align-self-center">
                            {{ $pengumuman->judul_pengumuman }}
                        </h2>

                        {{-- Tombol Edit dan Hapus --}}
                        <div class="align-self-start">
                            <a href="{{ route('admin.pengumuman.edit', ['id' => $pengumuman->id]) }}" class="btn" id="btn-edit">
                                <i class='bx bx-pencil'></i> 
                                <span class="d-none d-xl-inline ms-1">Edit</span>
                            </a>
                            <form action="{{ route('admin.pengumuman.destroy', ['id' => $pengumuman->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="btn-hapus"
                                    onclick="return confirm('Yakin ingin menghapus pengumuman ini?');">
                                    <i class='bx bx-trash'></i>
                                    <span class="d-none d-xl-inline ms-1">Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr class="my-2 w-100" style="border: 1.5px solid black; opacity: 1;">

                    {{-- Isi Pengumuman --}}
                    <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
                        {!! nl2br(e($pengumuman->deskripsi_pengumuman)) !!}
                    </p>

                    {{-- Tombol Kembali --}}
                    <div class="detail">
                        <a href="{{ route('admin.pengumuman.index') }}" class="btn px-3">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
