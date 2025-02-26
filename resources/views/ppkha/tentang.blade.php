@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->

        <!-- Berita Section -->
      <div class="pengumuman-section">
        <h2 class="section-title">BERITA</h2>
        <div class="pengumuman-grid">
            <!-- Static Cards -->
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
      </div>

      <!-- Berita Section -->
    <div class="pengumuman-section">
      <h2 class="section-title">BERITA</h2>
      <div class="pengumuman-grid">
          <!-- Static Cards -->
          <div class="card" style="width: 18rem;">
              <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 1">
              <div class="card-body">
                  <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                  <a href="#" class="btn btn-primary">Selengkapnya</a>
              </div>
          </div>

          <div class="card" style="width: 18rem;">
              <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 2">
              <div class="card-body">
                  <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                  <a href="#" class="btn btn-primary">Selengkapnya</a>
              </div>
          </div>

          <div class="card" style="width: 18rem;">
              <img src="{{ asset('assets/images/image.png') }}" class="card-img-top" alt="Pengumuman 3">
              <div class="card-body">
                  <h5 class="card-title">IT Del Akan Mengadakan KMC (Keluarga Mahasiswa Cup)</h5>
                  <a href="#" class="btn btn-primary">Selengkapnya</a>
              </div>
          </div>
      </div>
  </div>
    </div>

    @include('components.footer')
@endsection