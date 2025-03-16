@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content" style="max-height: 80vh; overflow-y: auto; padding: 15px;">
  <h1>Daftar Perusahaan</h1>

  <div class="d-flex flex-row gap-2 mb-4">
    <form>
      <input type="text" id="cariPerusahaan" name="cariPerusahaan" placeholder="Cari Perusahaan">
    </form>
    <div class="search-logo d-flex justify-content-center align-items-center">
      <i class='bx bx-search-alt-2'></i>
    </div>
  </div>

  @foreach($perusahaan as $p)
  <div class="background-card">
  <div class="card-information d-flex align-items-center px-3">
      <img style="width: 130px" src="{{ $p->logo ? asset('storage/' . $p->logo) : asset('assets/images/default-logo.png') }}">
      <div class="ps-3">
        <h2 class="fst-italic roboto-title mb-0 align-self-center">
          {{ $p->namaPerusahaan }}
        </h2>

        <div class="align-self-start">
                            <a href="{{ route('admin.perusahaan.edit', $p->id) }}" class="btn">
                                <i class='bx bx-pencil'></i> Edit
                            </a>
                            <button type="button" class="btn" onclick="openDeleteModal({{ $p->id }}, '{{ $p ->namaPerusahaan }}')">
                          <i class='bx bx-trash'></i> 
                          <span class="d-none d-xl-inline">Hapus</span>
                        </button>   
                        </div>

        <hr class="my-2" style="border: 2px solid black; opacity: 1">
        <div class="d-flex flex-row align-items-center" style="gap: 5px">
          <p class="mb-0 montserrat-light">{{ $p->lokasiPerusahaan }}</p>
          <div class="circle"></div>
          <p class="mb-0 montserrat-medium">{{ $p->industriPerusahaan }}</p>
        </div>
        <p class="roboto mb-1 mt-2" style="font-size: 15px">
          {{ $p->deskripsiPerusahaan }}
        </p>
        <div class="detail">
          <a href="{{ route('admin.daftarPerusahaan.daftarPerusahaanDetail', ['id' => $p->id]) }}">
            Selengkapnya..
          </a>
        </div>
      </div>
    </div>
  </div>
@endforeach

  
  <div class="pagination">
    {{ $perusahaan->links() }}
  </div>

  <div class="align-self-end justify-self-end" style="margin-bottom: 100px">
    
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Hapus Data Perusahaan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Apakah Kamu yakin ingin menghapus data Perusahaan <b id="namaPerusahaan"></b>?</p>
          </div>
          <div class="modal-footer">
              <!-- Tombol Batal dengan warna abu-abu dan teks putih -->
              <button type="button" class="btn btn-secondary" style="color: white;"
                  data-bs-dismiss="modal">Batal</button>
              <!-- Tombol Hapus dengan warna merah dan teks putih -->
              <button type="button" class="btn"
                  style="background-color: #FF0000; border: 1px solid #FF0000; color: white;"
                  id="confirmDeleteButton">Ya, Tetap Hapus</button>
          </div>
      </div>
  </div>
</div>

<script>
  let selectedId = null;

  function openDeleteModal(id, title) {
      selectedId = id;
      document.getElementById('namaPerusahaan').innerText = title;
      const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
      deleteModal.show();
  }

  document.getElementById('confirmDeleteButton').addEventListener('click', function() {
      fetch(`/admin/daftar-perusahaan/${selectedId}`, {
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
                  window.location.href = '{{ route('admin.daftarPerusahaan.daftarPerusahaan') }}';
              } else {
                  console.error(data.message);
              }
          })
          .catch(error => console.error('Error:', error));
  });
</script>
@endsection