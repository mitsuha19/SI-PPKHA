@extends('layouts.appAdmin')

@section('content')
    @include('components.navbarAdmin')
    <div class="main-content d-flex flex-column align-items-center">
        <h1>Pengumuman</h1>

        <div class="d-flex flex-row justify-content-center gap-2 w-100 mb-3">
    <form class="w-50 d-flex" action="{{ route('admin.pengumuman.index') }}" method="GET">
        <input type="text" id="pengumuman" name="search" class="form-control" placeholder="Cari Berita..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ms-2">
            <i class='bx bx-search-alt-2'></i>
        </button>
    </form>
</div>

        <div class="d-flex flex-column align-items-center w-100 gap-2">
            <div class="d-flex justify-content-end" style="width: 80%">
              <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
                <i class='bx bx-plus-circle'></i> Tambah
              </a>
            </div>

            @foreach ($pengumuman as $item)
                <div class="background-card">
                    <div class="card-information d-flex align-items-center px-3">
                        @php
                            $gambarArray = $item->gambar ?? [];
                        @endphp

                        @if (!empty($gambarArray) && isset($gambarArray[0]))
                            <img style="width: 18%; height: 100px; object-fit: contain; border-radius: 8px;"
                                src="{{ asset('storage/' . $gambarArray[0]) }}" alt="Gambar Pengumuman">
                        @else
                            <img style="width: 18%; height: 100px; object-fit: contain; border-radius: 8px;"
                                src="{{ asset('assets/images/image.png') }}" alt="Default Gambar">
                        @endif

                        <div class="ps-3 w-100">
                            <div class="d-flex flex-row w-auto justify-content-start align-items-end">
                                <h2 class="fst-italic roboto-title mb-0 align-self-center">
                                    {{ $item->judul_pengumuman }}
                                </h2>

                                <div class="ms-auto d-flex gap-2">
                                    <button type="button" class="btn btn-primary px-4 py-2 fw-bold d-flex align-items-center" onclick="window.location.href='{{ route('admin.pengumuman.edit', $item->id) }}'">
                                    <i class='bx bx-pencil fs-5 me-2'></i> Edit
                                    </button>
                                    
                                    <button type="button" class="btn btn-primary px-4 py-2 fw-bold d-flex align-items-center" onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul_berita }}')">
                                    <i class='bx bx-trash fs-5 me-2'></i> Hapus
                                    </button>                      
                                </div>
                            </div>

                            <hr class="my-2 w-100" style="border: 2px solid black; opacity:1">

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
        </div>

        <div class="pagination">
            {{ $pengumuman->appends(request()->query())->links() }}
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
