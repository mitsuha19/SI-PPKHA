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
                    <h5 class="horizontal-card-title2">GENERAL ADMIN STAFF</h5>
                    <p class="horizontal-card-text2">
                        Norxel Teknologi Indonesia<br>
                        <div class="text-row">
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
        </div>
    </div>

    <div class="horizontal-card3 mt-4">
      <div class="horizontal-card-body3">
        <div class="text-container">
          <div class="horizontal-card-text-section3">
            <h5 class="horizontal-card-title3" >TENTANG KAMI</h5>
            <p class="horizontal-card-text2"> PT Norxel Teknologi Indonesia adalah perusahaan manufaktur yang bergerak di bidang pembuatan mesin perbankan. Kami berkomitmen untuk terus berinovasi dalam menyediakan solusi teknologi yang andal bagi industri perbankan.</p>
          </div>
        </div>
      </div>
    </div>  

    <div class="horizontal-card3 mt-4"> 
      <h2 class="title">Lowongan</h2>
      <div style="border-bottom: 1px solid #000; padding: 10px;">
      <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
        <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
        
        <div class="job-info" style="display: grid; gap: 10px;">
            <h3>General Admin Staff</h3>
            <ul style="margin: 0; padding-left: 20px;">
                <li>Membuat laporan dan report</li>
                <li>Menguasai Microsoft Excel dan Microsoft Word</li>
            </ul>
            
        </div>
        
        <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
        
    </div>
    <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
      <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  
  <div style="border-bottom: 1px solid #000; padding: 10px;">
    <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
      <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
      
      <div class="job-info" style="display: grid; gap: 10px;">
          <h3>General Admin Staff</h3>
          <ul style="margin: 0; padding-left: 20px;">
              <li>Membuat laporan dan report</li>
              <li>Menguasai Microsoft Excel dan Microsoft Word</li>
          </ul>
          
      </div>
      
      <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
      
  </div>
  <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  
  <div style="border-bottom: 1px solid #000; padding: 10px;">
    <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
      <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
      
      <div class="job-info" style="display: grid; gap: 10px;">
          <h3>General Admin Staff</h3>
          <ul style="margin: 0; padding-left: 20px;">
              <li>Membuat laporan dan report</li>
              <li>Menguasai Microsoft Excel dan Microsoft Word</li>
          </ul>
          
      </div>
      
      <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
      
  </div>
  <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  
  <div style="border-bottom: 1px solid #000; padding: 10px;">
    <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
      <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
      
      <div class="job-info" style="display: grid; gap: 10px;">
          <h3>General Admin Staff</h3>
          <ul style="margin: 0; padding-left: 20px;">
              <li>Membuat laporan dan report</li>
              <li>Menguasai Microsoft Excel dan Microsoft Word</li>
          </ul>
          
      </div>
      
      <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
      
  </div>
  <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  
  <div style="border-bottom: 1px solid #000; padding: 10px;">
    <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
      <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
      
      <div class="job-info" style="display: grid; gap: 10px;">
          <h3>General Admin Staff</h3>
          <ul style="margin: 0; padding-left: 20px;">
              <li>Membuat laporan dan report</li>
              <li>Menguasai Microsoft Excel dan Microsoft Word</li>
          </ul>
          
      </div>
      
      <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
      
  </div>
  <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  
  <div style="border-bottom: 1px solid #000; padding: 10px;">
    <div style="display: flex; align-items: start; gap: 20px;  padding: 10px;">
      <img src="{{ asset('assets/images/Norxel.png') }}" alt="Norxel Logo" style="width: 100px; height: auto;">
      
      <div class="job-info" style="display: grid; gap: 10px;">
          <h3>General Admin Staff</h3>
          <ul style="margin: 0; padding-left: 20px;">
              <li>Membuat laporan dan report</li>
              <li>Menguasai Microsoft Excel dan Microsoft Word</li>
          </ul>
          
      </div>
      
      <a href="#" class="detail" style="margin-left: auto; text-decoration: none; color: #007bff; font-weight: bold;">Detail →</a>
      
  </div>
  <div class="job-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">KOTA JAKARTA UTARA</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Administrasi</span>
    <span style="background: #f3f3f3; padding: 5px 10px; border-radius: 5px;">Full-Time</span>
  </div>
  </div>
  </div> 
</div>

@include('components.footer')
@endsection