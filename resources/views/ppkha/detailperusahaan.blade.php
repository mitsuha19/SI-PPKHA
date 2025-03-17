@extends('layouts.app')

@section('content')
@include('components.navbar')

<div class="p-3 detail-content">
    <!-- Berita Section -->
    <div class="horizontal-card2 mt-4">
        <!-- ***CHANGE START***: Added horizontal-card-body2 as a Flexbox container -->
        <div class="horizontal-card-body2">
            <!-- First Container: Image (left) -->
            <div class="image-container">
                <img src="{{asset('assets/images/Norxel.png')}}" class="horizontal-card2 img" alt="...">
            </div>
            
            <!-- Second Container: Text (center) -->
            <div class="text-container">
                <div class="horizontal-card-text-section2">
                    <h5 class="horizontal-card-title2">
                      {{ $perusahaan->namaPerusahaan }}
                    </h5>
                    <p class="horizontal-card-text2">
                        Norxel Teknologi Indonesia<br>
                        @forelse ($lowongan as $job)
                        <div class="text-row">
                            <div class="info-item">
                                <span class="text-label">Lokasi</span>
                                <span class="text-value">{{ $perusahaan->lokasiPerusahaan }}</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Departemen</span>
                                <span class="text-value">{{ $job->jenisLowongan }}</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Jenis Pekerjaan</span>
                                <span class="text-value">{{ $job->tipeLowongan }}</span>
                            </div>
                        </div>
                        @empty
                          <p>Tidak ada lowongan tersedia saat ini.</p>
                        @endforelse
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="horizontal-card3 mt-4">
      <div class="horizontal-card-body3">
        <div class="text-container">
          <div class="horizontal-card-text-section3">
            <h5 class="horizontal-card-title3" >TENTANG KAMI</h5>
            <p class="horizontal-card-text2"> 
              {{ $perusahaan->deskripsiPerusahaan }}
            </p>
          </div>
        </div>
      </div>
    </div>  

    <div class="horizontal-card3 mt-4"> 
      <h2 class="title">Lowongan</h2>
      @foreach($lowongan as $l)
      <div style="border-bottom: 1px solid #000; padding: 10px;">
      <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
        <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
        
        <div class="job-info" style="display: grid; gap: 10px;">
            <h3>{{ $job->judulLowongan }}</h3>
            <ul style="margin: 0; padding-left: 20px;">
                <li>{{ $job->deskripsiLowongan }}</li>
            </ul> 
        </div>
        
        <a href="{{ route('ppkha.lowonganPekerjaanDetail', ['id' => $l->id]) }}" class="detail d-flex flex-row gap-1 align-items-center" style="margin-left: auto; text-decoration: none; color: black; font-weight: bold;">
          Detail 
          <i class='bx bx-right-arrow-alt'></i>
        </a>
        
    </div>
    <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">{{ strtoupper($job->perusahaan->lokasiPerusahaan) }}</span>
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">{{ $job->jenisLowongan }}</span>
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">{{ $job->tipeLowongan }}</span>
  </div>
  </div>
  @endforeach

  </div> 
</div>

@include('components.footer')
@endsection