@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content d-flex flex-column align-items-center">
        <h1>Pengumuman</h1>

        <div class="d-flex flex-row gap-2 mb-4">
            <form>
                <input type="text" id="pengumuman" name="pengumuman" placeholder="Cari Pengumuman">
            </form>
            <div class="search-logo d-flex justify-content-center align-items-center">
                <i class='bx bx-search-alt-2'></i>
            </div>
        </div>

        @foreach ($pengumuman as $item)
            <div class="background-card">
                <div class="card-pengumuman d-flex align-items-center px-3">
                    @php
                        $gambarArray = $item->gambar ?? [];
                    @endphp

                    @if (!empty($gambarArray) && isset($gambarArray[0]))
                        <img style="width: 151px; height: 100px; object-fit: contain; border-radius: 8px;"
                            src="{{ asset('storage/' . $gambarArray[0]) }}" alt="Gambar Pengumuman">
                    @else
                        <img style="width: 151px; height: 100px; object-fit: contain; border-radius: 8px; background-color: #f0f0f0;"
                            src="{{ asset('assets/images/image.png') }}" alt="Default Gambar">
                    @endif

                    <div class="ps-3 w-100">
                        <div class="d-flex flex-row w-auto justify-content-start align-items-end">
                            <h2 class="fst-italic roboto-title mb-0 align-self-center">{{ $item->judul_pengumuman }}</h2>
                            <div class="align-self-start ms-auto d-flex gap-2">
                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn">
                                    <i class='bx bx-pencil'></i> Edit
                                </a>
                                <button type="button" class="btn"
                                    onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_pengumuman }}')">
                                    <i class='bx bx-trash'></i> Hapus
                                </button>
                            </div>
                        </div>

                        <hr class="my-2" style="border: 2px solid black; opacity:1">

                        <p class="roboto-light mb-1 mt-2" style="font-size: 15px">
                            {{ Str::limit($item->deskripsi_pengumuman, 200, '...') }}
                        </p>

                        <div class="detail">
                            <a href="{{ route('admin.pengumuman.show', $item->id) }}">Selengkapnya..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="pagination">
            {{ $pengumuman->links() }}
        </div>

        <div class="align-self-end justify-self-end me-5" style="margin-bottom: 100px">
            <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
                <i class='bx bx-plus-circle'></i> Tambah
            </a>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Kamu yakin ingin menghapus pengumuman <b id="pengumumanTitle"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Ya, Tetap Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedId = null;

        function openDeleteModal(id, title) {
            selectedId = id;
            document.getElementById('pengumumanTitle').innerText = title;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            fetch(`/admin/pengumuman/${selectedId}`, {
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
                        window.location.href = '{{ route('admin.pengumuman.index') }}';
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
