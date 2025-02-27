@extends('layouts.app')

@section('content')
@include('components.navbar')

<div class="p-3 detail-content">
<div class="container-lowongan">
    <div class="card-title">
        <div class="card-body d-flex justify-content-between align-items-start">
            <!-- Kiri: Logo dan Informasi Pekerjaan -->
            <div class="d-flex">
              <img src="{{ asset('assets/images/Norxel.png') }}" >
                <div class="ms-3">
                    <h4 class="job-title">General Admin Staff</h4>
                    <p class="company-name">Norxel Teknologi Indonesia</p>
                    <div class="job-details">
                        <div class="job-column">
                            <span class="label">Lokasi</span>
                            <span class="value">KOTA JAKARTA UTARA</span>
                        </div>
                        <div class="job-column">
                            <span class="label">Departemen</span>
                            <span class="value">Administrasi</span>
                        </div>
                        <div class="job-column">
                            <span class="label">Jenis Pekerjaan</span>
                            <span class="value">Full-Time</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Kanan: Tombol Lamar dan Bagikan -->
            <div class="apply-box">
                <button class="apply-btn">Lamar</button>
            <div class="share-section">
                <span>Bagikan</span>
                <div class="social-icons">
                <a href="#"><img src="{{ asset('assets/images/facebook-logo.png') }}" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('assets/images/Instagram-logo.png') }}"  alt="Instagram"></a>
                <a href="#"><img src="{{ asset('assets/images/Whatsapp-logo.png') }}" alt="WhatsApp"></a>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="section-title">Deskripsi Lowongan</h4>
            <ul class="job-description">
                <li>Membuat laporan dan report</li>
                <li>Menguasai Microsoft Excel dan Microsoft Word</li>
                <li>Melakukan filing dokumen</li>
                <li>Melakukan entry data</li>
                <li>Penjadwalan dan koordinasi</li>
                <li>Bantuan kepada staff</li>
            </ul>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="section-title">Kualifikasi</h4>
            <ul class="qualification-list">
                <li>Berusia maksimal 28 tahun</li>
                <li>Pendidikan minimal D3/S1</li>
                <li>Bersedia ditempatkan di Jakarta Utara (domisili Jakarta Utara menjadi poin plus)</li>
                <li>Multitasking, cekatan siap kerja dan mau belajar</li>
                <li>Memiliki pengalaman menjadi poin plus</li>
                <li>Fresh graduate are welcome to apply</li>
            </ul>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="section-title">Benefit</h4>
            <p class="no-benefit">Belum ada benefit dari lowongan pekerjaan ini</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="section-title">Keahlian</h4>
            <div class="skills-container">
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

</div>

@include('components.footer')
@endsection
