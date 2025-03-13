@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="content-with-background">
        @include('components.bg') <!-- Renders the background waves -->

        <div class="pengumuman-section">
            <h2 class="section-title">USER SURVEY</h2>
        </div>
        <div class="user-survey">
            <div class="user-survey-content">
                <div class="card-user-survey">
                    <h1 class="montserrat-medium text-black" style="font-size: 22px; font-style: italic;">1. Identitas Pengisi
                    </h1>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Nama Lengkap</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan judul berita">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Jabatan</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan jabatan">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Email</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan Email : contoh@gmaill.com">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Nomor Telepon</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                </div>

                <div class="card-user-survey">
                    <h1 class="montserrat-medium text-black" style="font-size: 22px; font-style: italic;">2. Informasi Umum
                    </h1>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Berapakah jumlah lulusan
                                kami yang bekerja di instansi/perusahaan anda?</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan jumlah lulusan">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Berapa nilai IPK minimal
                                untuk bekerja di instansi/perusahaan Bapak/Ibu?:</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Contoh: 4.00">
                    </div>
                </div>

                <div class="card-user-survey">
                    <h1 class="montserrat-medium text-black" style="font-size: 22px; font-style: italic;">3. Identitas
                        Lembaga/Perusahaan</h1>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Nama:</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan judul berita">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Alamat:</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan jabatan">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Provinsi:</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                placeholder="Masukkan Email : contoh@gmaill.com">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Kota/ Kabupaten:</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Kecamatan:</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Email:</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Nomor Telp/ WA:</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="box-form">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="judul_berita" class="montserrat-medium text-black mb-2">Bidang Usaha</label>
                            <input type="text" class="form-control " id="judul_berita" name="judul_berita"
                                placeholder="Masukkan nomor telepon">
                    </div>
                </div>

                <div class="card-user-survey">
                    <h1 class="montserrat-medium text-black" style="font-size: 22px; font-style: italic;">4. Etika</h1>

                    <div class="radioButtons">
                        <h3 class="poppins-regular text-black" style="font-size: 16px;">Kepatuhan pada tata nilai yang
                            berlaku</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Kurang
                            </label>
                        </div>
                    </div>


                    <div class="radioButtons">
                        <h3 class="poppins-regular text-black" style="font-size: 16px;">Mematuhi aturan dan norma yang
                            berlaku</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Kurang
                            </label>
                        </div>
                    </div>

                    <div class="radioButtons">
                        <h3 class="poppins-regular text-black" style="font-size: 16px;">Kecerdasan emosional (emotional
                            intelligence)</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" style="font-style:italic" for="flexRadioDefault1">
                                Sangat Kurang
                            </label>
                        </div>
                    </div>
                </div>

                <button class="userSurveyButton" style="justify-content: center">Kirim</button>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
