@extends('layouts.appAdmin')

@section('content')
@include('components.navbarAdmin')
<div class="main-content">
  <h1 class="poppins-bold text-black mt-3" style="font-size: 22px">Tambah Lowongan Pekerjaan</h1>
  <div class="box-form">
      <form action="">
        <label for="namaPerusahaan" class="poppins-bold text-black mb-2">Nama Perusahaan:</label>
        <input type="text" class="form-control mb-3" id="namaPerusahaan" placeholder="Masukkan nama Perusahaan">

        <label for="alamatPerusahaan" class="poppins-bold text-black mb-2">Alamat Perusahaan:</label>
        <input type="text" class="form-control mb-3" id="alamatPerusahaan" placeholder="Pilih Kota/Kabupaten Perusahaan">

        <label for="jenisLowongan" class="poppins-bold text-black mb-2">Jenis Lowongan * <span style="font-size: 12px">Departement</span>:</label>
        <input type="text" class="form-control mb-3" id="jenisLowongan" placeholder="Masukkan Jenis Lowongan, contoh: FullStack; Administrasi; ">

        <label for="deskripsi" class="form-label poppins-bold text-black mb-2">Deskripsi Lowongan:</label>
        <textarea class="form-control mb-3" id="deskripsi" placeholder="Masukkan deskripsi Lowongan"></textarea>

        <label for="kualifikasi" class="form-label poppins-bold text-black mb-2">Kualifikasi Lowongan:</label>
        <textarea class="form-control mb-3" id="kualifikasi" placeholder="Masukkan Kualifikasi Lowongan"></textarea>  

        <label for="benefit" class="form-label poppins-bold text-black mb-2">Benefit Lowongan:</label>
        <textarea class="form-control mb-3" id="benefit" placeholder="Masukkan Benefit Lowongan"></textarea>  

        <label for="keahlian" class="poppins-bold text-black mb-2">Keahlian Lowongan: </label>
        <input type="text" class="form-control mb-3" id="keahlian" placeholder="Pilih Keahlian Lowongan">

        <label for="batasLamaran" class="poppins-bold text-black mb-2">Tambahkan batas Lamaran: </label>
        <div class="d-flex flex-row">
          <input type="date" class="form-control mb-3" id="batasMulai">
          <i class='bx bx-md bx-minus'></i>
          <input type="date" class="form-control mb-3" id="batasAkhir">
        </div>
        
        <label for="myFile" class="form-label poppins-bold text-black mt-2">Tambahkan Gambar/Logo:</label>
        <div class="button-wrap">
          <label class="buttonUploadFile" for="upload">
            <i class='bx bx-upload me-1'></i>
            Choose a File
          </label>
          <input id="upload" type="file">
        </div>
        <div class="d-flex justify-content-end align-items-end gap-2">
          <button>Batal</button>
          <button>Tambah</button>
        </div>
      </form>
  </div>
</div>
@endsection
