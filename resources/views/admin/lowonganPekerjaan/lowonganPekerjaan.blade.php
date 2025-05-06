@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')

    <div class="main-content d-flex flex-column align-items-center">
        <h1>Lowongan Pekerjaan</h1>

        {{-- Form Pencarian --}}
        <div class="d-flex flex-row justify-content-center gap-2 w-100 mb-3">
            <form class="w-50 d-flex" action="{{ route('admin.lowonganPekerjaan.lowonganPekerjaan') }}" method="GET">
                <input type="text" id="lowongan" name="search" class="form-control" placeholder="Cari Lowongan Pekerjaan..."
                    value="{{ request('search') }}">
                <button type="submit" class="search-logo d-flex justify-content-center align-items-center">
                    <i class='bx bx-search-alt-2'></i>
                </button>
            </form>
        </div>

        <div class="d-flex flex-column align-items-center w-100 gap-2">
            <div class="d-flex justify-content-end" style="width: 80%">
                <a href="{{ route('admin.lowonganPekerjaan.add') }}" class="btn btn-tambah mt-2">
                    <i class='bx bx-plus-circle'></i> Tambah
                </a>
            </div>

            {{-- Card Lowongan --}}
            @foreach ($lowongan as $l)
                <div class="background-card" style="width: 80%; margin: 0 auto; position: relative;">
                    <div class="card-information d-flex flex-column justify-content-between px-3"
                        style="min-height: 200px;">
                        {{-- Tombol Edit dan Hapus --}}
                        <div style="position: absolute; top: 10px; right: 10px; z-index: 1;">
                            <div class="d-flex gap-2">
                                <button type="button" id="btn-edit"
                                    class="btn btn-primary px-4 py-2 fw-bold d-flex align-items-center"
                                    onclick="window.location.href='{{ route('admin.lowonganPekerjaan.edit', $l->id) }}'">
                                    <i class='bx bx-pencil fs-5 me-2'></i> Edit
                                </button>

                                <button type="button" id="btn-hapus"
                                    class="btn btn-primary px-4 py-2 fw-bold d-flex align-items-center"
                                    onclick="openDeleteModal({{ $l->id }}, '{{ $l->judulLowongan }}')">
                                    <i class='bx bx-trash fs-5 me-2'></i> Hapus
                                </button>
                            </div>
                        </div>

                        {{-- Isi Card --}}
                        <div class="d-flex align-items-center pt-4">
                            {{-- Logo --}}
                            <div style="width: 100px; height: 100px; flex-shrink: 0;">
                                <img src="{{ $l->perusahaan && $l->perusahaan->logo ? asset($l->perusahaan->logo) : 'https://via.placeholder.com/100' }}"
                                    alt="Logo Perusahaan"
                                    style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                            </div>

                            {{-- Detail --}}
                            <div class="ps-3 d-flex flex-column justify-content-between" style="flex: 1;">
                                <div>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <h2 class="fst-italic roboto-title mb-0"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ Str::limit($l->judulLowongan, 60, '...') }}
                                        </h2>
                                    </div>

                                    <hr class="my-2" style="border: 2px solid black; opacity: 1;">

                                    <p class="mb-0 montserrat-light"
                                        style="max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $l->perusahaan->namaPerusahaan ?? 'Perusahaan tidak tersedia' }}
                                    </p>

                                    <ul class="roboto-light text-black mb-1 mt-2"
                                        style="font-size: 15px; margin: 0; padding: 0; list-style: none; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 40px;">
                                        {!! nl2br(e(Str::limit($l->deskripsiLowongan, 50, '...'))) !!}
                                    </ul>

                                    <div class="d-flex flex-row gap-2 mb-2">
                                        <div class="pills"
                                            style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $l->perusahaan->lokasiPerusahaan ?? 'Lokasi tidak ada' }}
                                        </div>
                                        <div class="pills"
                                            style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $l->jenisLowongan }}
                                        </div>
                                        <div class="pills"
                                            style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            Full-Time
                                        </div>
                                    </div>
                                </div>

                                <div class="detail mt-auto text-end">
                                    <a
                                        href="{{ route('admin.lowonganPekerjaan.lowonganPekerjaanDetail', ['id' => $l->id]) }}">
                                        Selengkapnya..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="pagination">
                {{ $lowongan->appends(request()->query())->links() }}
            </div>
        </div>

        {{-- Modal Hapus --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: linear-gradient(to bottom, #80C7D9, #446973);">
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center gap-4">
                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                        <h2 class="text-center">Apakah anda yakin untuk menghapus <b id="judulLowongan"></b>?</h2>

                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal"
                                style="padding: 15px 40px; font-size: 1.5rem; background: linear-gradient(to bottom, #80C7D9, #446973); border: none;">
                                Cancel
                            </button>

                            <button type="button" class="btn btn-lg text-white" id="confirmDeleteButton"
                                style="padding: 15px 40px; font-size: 1.5rem; background: linear-gradient(to bottom, #80C7D9, #446973); border: none;">
                                Yes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script Hapus --}}
        <script>
            let selectedId = null;

            function openDeleteModal(id, title) {
                selectedId = id;
                document.getElementById('judulLowongan').innerText = title;
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            }

            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                fetch(`/admin/lowongan-pekerjaan/${selectedId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Gagal menghapus data.');
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = '{{ route('admin.lowonganPekerjaan.lowonganPekerjaan') }}';
                        } else {
                            console.error(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        </script>
    </div>
@endsection
