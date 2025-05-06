<footer class="px-3" style="padding-left: 1rem; padding-right: 1rem;">
    <div class="container flex justify-between items-center" style="display: flex; flex-direction: column; align-items: stretch;">

        <div class="d-flex flex-column" style="margin-bottom: 20px;">

            <div class="d-flex flex-row mb-3" style="display: flex; flex-direction: row; margin-bottom: 1rem; width: 100%;">
                {{-- Logo dan Nama Website --}}
                <div class="">
                    <img src="{{ asset('assets/images/itdel.png') }}" alt="Logo" width="40" height="auto" class="me-3"style="margin-right: 10px;">
                </div>
                <div class="">
                    <div class="d-flex flex-column align-items-start text-start" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left; line-height: 0.9; gap: 0px; width: 150px;">
                        <span class="fs-4 fw-bold poppins-bold" style="font-size: 1.5rem; font-weight: bold;">CAIS</span>
                        <p class="m-0 two-line-text roboto-light" style="margin: 0; font-size: 12px; margin-top: -4px; width: max-content;">Career Alumni Information System</p>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row text-start">
            <div class="me-5" style="width: 300px;">
                {{-- Contact Us dan Find Us --}}
                <div style="width: 200px">
                    <h3 class="poppins-semibold m-0">Contact Us</h3>
                    <p class="poppins-regular" >
                        Institut Teknologi Del <br>
                        Jl. Sisingamangaraja, Sitoluama <br>
                        Laguboti, Toba Samosir <br>
                        Sumatera Utara, Indonesia <br>
                        Kode Pos: 22381 <br>
                        Telp: +62 632 331234 <br>
                        Fax: +62 632 331116 <br>
                    </p>
                    <h3 class="poppins-semibold m-0">Find Us On</h3>
                    <div class="d-flex flex-row">
                        <div class="me-3" style="width: 100px">
                            <a class="social-media">
                                <i class='bx bxl-facebook'></i>
                                IT DEL
                            </a> 
                            <br>
                            <a class="social-media">
                                <i class='bx bxl-linkedin'></i>
                                IT DEL
                            </a>
                        </div>
                        <div class="ms-2 w-75">
                            <a class="social-media">
                                <i class='bx bxl-instagram'></i>
                                @it_del
                            </a> 
                            <br>
                            <a class="social-media">
                                <i class='bx bxl-twitter'></i>
                                @it_del
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="mx-2"></div> --}}
            <div class="ms-5" style="width: 100%; margin-left: 0 !important; margin-bottom: 20px;">

                <h3 class="poppins-semibold m-0">Kemitraan</h3>
                    <p class="poppins-regular m-0" >
                        Lembaga Dalam & Luar Negeri;, MER Security and Communication, KTH Royal Institute of Technology, 
                        Czech University of Life Sciences Prague (CULS), University of Amsterdam, “1. The International 
                        Computing Academy (ICA), 2. PT Kinema Systrans multimedia ‘Infinite Studios’ (IS)”, “1. Politechnical 
                        College No8 (PT8), 2. Russia-Indonesia Business Council (RIBC), 3. Indonesia-Russia Business Council 
                        (IRBC) “, Hebei Normal university, Czech University of Life Sciences in Prague (CULS) (ERASMUS +), 
                        University of Queensland, The University Of Groningen, The Netherlands, GLINTS SINGAPORE PTE LTD, University 
                        of Amsterdam dan Universitas-universitas dalam negeri.
                    </p>
            </div>
        </div>
        </div>

    </div>

    <style>
    /* Style dasar untuk mobile */
    .footer .container {
        display: flex;
        flex-direction: column; /* Menumpuk elemen secara vertikal */
        align-items: stretch; /* Membuat item membentang selebar container */
    }

    .footer .d-flex.flex-row.mb-3 {
        width: 100%; /* Logo dan nama website mengisi lebar */
        margin-bottom: 1rem;
    }

    .footer .d-flex.flex-row.text-start {
        flex-direction: column; /* Kontak dan kemitraan menjadi kolom */
        width: 100%;
    }

    .footer .me-5,
    .footer .ms-5 {
        margin-right: 0 !important;
        margin-left: 0 !important;
        width: 100%; /* Setiap bagian mengisi lebar */
        margin-bottom: 20px; /* Jarak antar bagian */
    }

    .footer .d-flex.flex-row .me-3,
    .footer .d-flex.flex-row .ms-2 {
        margin-right: 10px !important;
        margin-left: 0 !important;
        width: auto; /* Lebar otomatis untuk ikon sosmed */
    }

    .footer .d-flex.flex-row .w-75 {
        width: auto !important; /* Lebar otomatis untuk teks sosmed */
    }

    .footer .two-line-text {
        font-size: 12px !important; /* Ukuran font lebih kecil */
    }

    /* Media query untuk layar yang lebih besar (tablet ke atas) */
    @media (min-width: 768px) {
        .footer .container {
            flex-direction: row; /* Kembali ke tata letak baris */
            justify-content: flex-start; /* Mengatur item ke kiri */
            align-items: flex-start; /* Mengatur item ke atas */
        }

        .footer .d-flex.flex-column {
            margin-bottom: 0;
            margin-right: 3rem; /* Memberi jarak antara logo dan kontak */
        }

        .footer .d-flex.flex-row.text-start {
            flex-direction: row; /* Kembali ke tata letak baris */
            width: auto;
            align-items: flex-start; /* Mengatur item ke atas */
        }

        .footer .me-5 {
            margin-right: 3rem !important;
            width: 300px; /* Mengembalikan lebar semula */
        }

        .footer .ms-5 {
            margin-left: 0 !important; /* Hapus margin kiri default */
            margin-right: 0 !important; /* Pastikan tidak ada margin kanan yang tidak diinginkan */
            width: auto; /* Mengembalikan lebar semula */
        }

        /* Tidak perlu lagi memanipulasi margin anak terakhir secara spesifik */

        .footer .two-line-text {
            font-size: 14px !important; /* Mengembalikan ukuran font semula */
        }
    }
</style>
</footer>