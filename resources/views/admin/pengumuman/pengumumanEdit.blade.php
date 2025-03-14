@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content">
        <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Edit Pengumuman</h1>
        <div class="box-form">
            <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Laravel membutuhkan ini untuk method PUT --}}

                <label for="judul" class="poppins-bold text-black mb-2">Judul Pengumuman:</label>
                <input type="text" class="form-control mb-3" id="judul" name="judul_pengumuman"
                    value="{{ $pengumuman->judul_pengumuman }}" required>

                <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Pengumuman:</label>
                <textarea class="form-control mb-3" id="deskripsi" name="deskripsi_pengumuman" required>{{ $pengumuman->deskripsi_pengumuman }}</textarea>

                <label for="lampiran" class="form-label poppins-bold text-black mt-2">Tambahkan Lampiran:</label>
                <div class="button-wrap">
                    <label class="buttonUploadFile" for="upload">
                        <i class='bx bx-upload me-1'></i>
                        Choose a File
                    </label>
                    <input id="upload" type="file" name="lampiran[]" multiple>
                </div>

                @if (!empty($pengumuman->lampiran))
                    <div class="mt-3">
                        <p class="poppins-bold text-black">Lampiran Saat Ini:</p>
                        @foreach (json_decode($pengumuman->lampiran, true) as $lampiran)
                            <div class="d-flex align-items-center">
                                <a href="{{ asset('storage/' . $lampiran) }}" target="_blank">{{ basename($lampiran) }}</a>
                                <input type="checkbox" name="hapus_lampiran[]" value="{{ $lampiran }}"> Hapus
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="d-flex justify-content-end align-items-end gap-2 mt-3">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
