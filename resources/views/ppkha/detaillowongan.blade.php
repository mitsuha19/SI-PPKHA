@extends('layouts.app')

@section('content')
@include('components.navbar')

<div class="p-3 detail-content">
    <!-- Berita Section -->
    <div class="message-lowongan montserrat-medium align-items-center">
        <i class='bx bx-md bx-message-error'></i>
        <p class="mb-0">Kamu dapat melamar lowongan ini pada 18 Feb 2025 - 17 Apr 2025</p>
    </div>
    
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
                    <h5 class="montserrat-medium mb-0" style="font-size: 36px;">GENERAL ADMIN STAFF</h5>
                    <p class="montserrat-medium" style="font-size: 15px;">
                        Norxel Teknologi Indonesia<br>
                        <div class="text-row montserrat-medium" style="width: fit-content">
                            <div class="info-item">
                                <span class="text-label">Lokasi</span>
                                <span class="text-value">Kota Jakarta Utara</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Departemen</span>
                                <span class="text-value">Administrasi</span>
                            </div>
                            <div class="info-item">
                                <span class="text-label">Jenis Pekerjaan</span>
                                <span class="text-value">Full Time</span>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
            
            <!-- Third Container: Right Section (right) -->
            <div class="right-section">
                <button class="lamar-btn">Lamar</button>
                <div class="share-section">
                    <a href="https://del.ac.id.com"><img src="{{ asset('assets/images/share_icon.png') }}" class="share-icon" alt="Share">
                    <span class="share-text">Bagikan</span>
                </div>
                <div class="social-icons">
                    <a href="https://facebook.com"><img src="{{ asset('assets/images/facebook-logo.png') }}" alt="Facebook"></a>
                    <a href="https://instagram.com"><img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram"></a>
                    <a href="https://whatsapp.com"><img src="{{ asset('assets/images/whatsapp.png') }}" alt="WhatsApp"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="horizontal-card3 mt-4">
        <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Deskripsi Lowongan</h5>
        <hr class="mt-1" style="opacity: 1">
        <ul class="mb-0 montserrat-medium" style="font-size: 12px">
            <li> Membuat laporan dan report </li>
            <li> Menguasai microsoft excel dan microsoft word </li>
            <li> Melakukan filing dokumen </li>
            <li> Melakukan entry data </li>
        </ul>
    </div>

    <div class="horizontal-card3 mt-4">
        <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Deskripsi Lowongan</h5>
        <hr class="mt-1" style="opacity: 1">
        <ul class="mb-0 montserrat-medium" style="font-size: 12px">
            <li> Membuat laporan dan report </li>
            <li> Menguasai microsoft excel dan microsoft word </li>
            <li> Melakukan filing dokumen </li>
            <li> Melakukan entry data </li>
        </ul>
    </div>

    <div class="horizontal-card3 mt-4">
        <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Deskripsi Lowongan</h5>
        <hr class="mt-1" style="opacity: 1">
        <ul class="mb-0 montserrat-medium" style="font-size: 12px">
            <li> Membuat laporan dan report </li>
            <li> Menguasai microsoft excel dan microsoft word </li>
            <li> Melakukan filing dokumen </li>
            <li> Melakukan entry data </li>
        </ul>
    </div>

    <div class="horizontal-card3 mt-4">
        <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Deskripsi Lowongan</h5>
        <hr class="mt-1" style="opacity: 1">
        <ul class="mb-0 montserrat-medium" style="font-size: 12px">
            <li> Membuat laporan dan report </li>
            <li> Menguasai microsoft excel dan microsoft word </li>
            <li> Melakukan filing dokumen </li>
            <li> Melakukan entry data </li>
        </ul>
    </div>

    <div class="horizontal-card3">
        <div class="horizontal-card-text-section3">
            <h5 class="montserrat-medium text-black mb-0" style="font-size: 28px;">Keahlian</h5>
            <hr class="mt-1" style="opacity: 1">
            <div class="skills-container gap-3">
                <span class="skill-badge">Business Development</span>
                <span class="skill-badge">Teamwork</span>
                <span class="skill-badge">Management</span>
                <span class="skill-badge">Office Administration</span>
                <span class="skill-badge">Good Communication Skills</span>
                <span class="skill-badge">Project Management</span>
                <span class="skill-badge">Finance</span>
                <span class="skill-badge">Administration</span>
                <span class="skill-badge">Microsoft Office</span>
                <span class="skill-badge">Customer Service</span>
            </div>
        </div>
    </div>  
</div>

@include('components.footer')
@endsection