@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="p-3 detail-content">
        <!-- Berita Section -->
        <div class="message-lowongan montserrat-medium align-items-center">
            <i class='bx bx-md bx-message-error'></i>
            <p class="mb-0">Kamu dapat melamar lowongan ini pada {{ date('d M Y', strtotime($lowongan->batasMulai)) }} - {{ date('d M Y', strtotime($lowongan->batasAkhir)) }}</p>
        </div>

        <div class="horizontal-card2 mt-4">
            <!-- ***CHANGE START***: Added horizontal-card-body2 as a Flexbox container -->
            <div class="horizontal-card-body2">
                <!-- First Container: Image (left) -->
                <div class="image-container">
                    <img src="{{ asset('assets/images/Norxel.png') }}" class="horizontal-card2 img" alt="...">
                </div>

                <!-- Second Container: Text (center) -->
                <div class="text-container">
                    <div class="horizontal-card-text-section2">
                        <h5 class="montserrat-medium mb-0" style="font-size: 36px;">{{ $lowongan->judulLowongan }}</h5>
                        <p class="montserrat-medium" style="font-size: 15px;">
                            {{ $lowongan->perusahaan->namaPerusahaan ?? 'Perusahaan tidak tersedia'}}<br>
                        <div class="text-row montserrat-medium" style="width: fit-content">
                            <div class="info-item">
                                <span class="text-label">Lokasi</span>
                                <span class="text-value">{{ $lowongan->perusahaan->lokasiPerusahaan ?? 'Lokasi  tidak ada' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Departemen</span>
                                <span class="text-value">{{ $lowongan->jenisLowongan }}</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Jenis Pekerjaan</span>
                                <span class="text-value">{{ $lowongan->tipeLowongan }}</span>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>

                <!-- Third Container: Right Section (right) -->
                <div class="right-section">
                    <button class="lamar-btn">Lamar</button>
                    <div class="share-section">
                        <a href="https://del.ac.id.com"><img src="{{ asset('assets/images/share_icon.png') }}"
                                class="share-icon" alt="Share">
                            <span class="share-text">Bagikan</span>
                    </div>
                    <div class="social-icons">
                        <a href="https://facebook.com"><img src="{{ asset('assets/images/facebook-logo.png') }}"
                                alt="Facebook"></a>
                        <a href="https://instagram.com"><img src="{{ asset('assets/images/instagram.png') }}"
                                alt="Instagram"></a>
                        <a href="https://whatsapp.com"><img src="{{ asset('assets/images/whatsapp.png') }}"
                                alt="WhatsApp"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="horizontal-card3 mt-4">
            <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Deskripsi Lowongan</h5>
            <hr class="mt-1" style="opacity: 1">
            <p class="mb-0 montserrat-medium" style="font-size: 12px">
                {!! nl2br(e(Str::limit($lowongan->deskripsiLowongan, 100, '...'))) !!}
            </p>
        </div>

        <div class="horizontal-card3 mt-4">
            <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Kualifikasi</h5>
            <hr class="mt-1" style="opacity: 1">
            <p class="mb-0 montserrat-medium" style="font-size: 12px">
                {!! nl2br(e($lowongan->kualifikasi ?: 'Belum ada kualifikasi dari lowongan pekerjaan ini')) !!}
            </p>
        </div>

        <div class="horizontal-card3 mt-4">
            <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Benefit</h5>
            <hr class="mt-1" style="opacity: 1">
            <p class="mb-0 montserrat-medium" style="font-size: 12px">
                {!! nl2br(e($lowongan->benefit ?: 'Belum ada benefit dari lowongan pekerjaan ini')) !!}
            </p>
        </div>

        <div class="horizontal-card3">
            <div class="horizontal-card-text-section3">
                <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Keahlian</h5>
                <hr class="mt-1" style="opacity: 1">
                <div class="skills-container gap-3">
                    
                    @php
                        $keahlian = !empty($lowongan->keahlian) ? explode(',', $lowongan->keahlian) : [];
                    @endphp

                    @if(count($keahlian) > 0)
                        @foreach($keahlian as $skill)
                            <span class="skill-badge">{{ trim($skill) }}</span>
                        @endforeach
                    @else
                        <p>Belum ada keahlian yang dicantumkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
