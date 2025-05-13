<footer class="px-3" style="padding-left: 1rem; padding-right: 1rem;">
    <div class="container flex justify-between items-center" style="display: flex; flex-direction: column; align-items: stretch;">
        <div class="d-flex flex-column" style="margin-bottom: 20px;">

            <div class="d-flex flex-row mb-3" style="display: flex; flex-direction: row; margin-bottom: 1rem; width: 100%;">
                {{-- Logo dan Nama Website --}}
                <div>
                    <img src="{{ asset('assets/images/itdel.png') }}" alt="Logo" width="40" height="auto" class="me-3" style="margin-right: 10px;">
                </div>
                <div>
                    <div class="d-flex flex-column align-items-start text-start" style="display: flex; flex-direction: column; align-items: flex-start; text-align: left; line-height: 0.9; gap: 0px; width: 150px;">
                        <span class="fs-4 fw-bold poppins-bold" style="font-size: 1.5rem; font-weight: bold;">CAIS</span>
                        <p class="m-0 two-line-text roboto-light" style="margin: 0; font-size: 12px; margin-top: -4px; width: max-content;">Career Alumni Information System</p>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row text-start" style="gap: 1rem; width: 100%;">
                <div style="width: 300px;">
                    {{-- Contact Us dan Find Us --}}
                    <div style="width: 200px">
                        <h3 class="poppins-semibold m-0">Contact Us</h3>
                        <p class="poppins-regular">
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

                <div style="flex: 1;">
                    <h3 class="poppins-semibold m-0">Kemitraan</h3>
                    <p class="poppins-regular m-0">
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
        @media (min-width: 768px) {
            .footer .container {
                flex-direction: row;
                justify-content: flex-start;
                align-items: flex-start;
            }

            .footer .d-flex.flex-column {
                margin-bottom: 0;
                margin-right: 3rem;
            }

            .footer .d-flex.flex-row.text-start {
                flex-direction: row;
                width: auto;
                align-items: flex-start;
                gap: 1rem; /* Tambahkan gap di sini untuk jarak tetap di versi desktop */
            }
        }
    </style>
</footer>
