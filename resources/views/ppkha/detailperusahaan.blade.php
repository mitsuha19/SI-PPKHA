@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="p-3 detail-content">
        <!-- Profil Perusahaan -->
        <div class="horizontal-card2 mt-4">
    <div class="card-perusahaan d-flex flex-column flex-md-row align-items-start gap-4 gap-md-5 text-start">
        <img style="width: 100px"
            src="{{ asset($perusahaan->logo ? $perusahaan->logo : 'assets/images/default-logo.png') }}"
            alt="Logo Perusahaan">

        <div class="montserrat-medium mb-0 w-100">
            <h2 class="fs-4 fs-md-2">{{ $perusahaan->namaPerusahaan }}</h2>
            <p class="mb-1">{{ $perusahaan->lokasiPerusahaan }}</p>

            <div class="d-flex flex-row" style="gap: 100px;">
                    <p><span style="color: #656565;">Industri</span><br>{{ $perusahaan->industriPerusahaan }}</p>
                    <p><span style="color: #656565;">Website</span><br><a href="{{ $perusahaan->websitePerusahaan }}"
                            target="_blank">{{ $perusahaan->websitePerusahaan }}</a></p>
                </div>
        </div>
    </div>
</div>


        <!-- Tentang Perusahaan -->
        <div class="horizontal-card3 mt-4">
            <div class="horizontal-card-body3">
                <div class="text-container">
                    <div class="horizontal-card-text-section3">
                        <h5 class="horizontal-card-title3">TENTANG KAMI</h5>
                        <p class="horizontal-card-text2">
                            {{ $perusahaan->deskripsiPerusahaan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lowongan -->
        <div class="horizontal-card3 mt-4">
            <h2 class="title">Lowongan</h2>
            @foreach ($lowongan as $job)
                <div style="border-bottom: 1px solid #000; padding: 20px 10px;">
                    <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-3">
                        {{-- Logo --}}
                        <div style="flex-shrink: 0;">
                            <img style="width: 100px"
                            src="{{ asset($perusahaan->logo ? $perusahaan->logo : 'assets/images/default-logo.png') }}"
                                alt="Logo" style="height: 72px; width: auto; object-fit: contain;">
                        </div>

                        {{-- Info Lowongan --}}
                        <div style="flex-grow: 1;">
                            <h4 style="margin-bottom: 8px; font-weight: 700;">{{ $job->judulLowongan }}</h4>
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach (explode("\n", Str::limit($job->deskripsiLowongan, 80, '...')) as $line)
                                    @if (trim($line) !== '')
                                        <li>{{ $line }}</li>
                                    @endif
                                @endforeach
                            </ul>

                            {{-- Tags --}}
                            <div class="job-tags mt-3 d-flex flex-wrap gap-2">
                                <span
                                    style="padding: 5px 15px; border: 2px solid #000; border-radius: 30px; font-style: italic; font-weight: 600;">
                                    {{ strtoupper($perusahaan->lokasiPerusahaan) }}
                                </span>
                                <span
                                    style="padding: 5px 15px; border: 2px solid #000; border-radius: 30px; font-style: italic; font-weight: 600;">
                                    {{ $job->jenisLowongan }}
                                </span>
                                <span
                                    style="padding: 5px 15px; border: 2px solid #000; border-radius: 30px; font-style: italic; font-weight: 600;">
                                    {{ $job->tipeLowongan }}
                                </span>
                            </div>
                        </div>

                        {{-- Detail Link --}}
                        <div class="mt-2 mt-md-0 ms-auto">
                            <a href="{{ route('ppkha.lowonganPekerjaanDetail', ['id' => $job->id]) }}"
                                style="font-style: italic; font-weight: bold; color: black; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                Detail <i class='bx bx-right-arrow-alt bx-sm'></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('components.footer')
@endsection
