<nav class="shadow-md">
    <div class="container">
            <!-- Logo dan Judul -->
            <div class="d-flex justify-content-start">
                <a class="text-white text-decoration-none">
                    <img src="{{ asset('assets/images/itdel.png') }}" alt="Logo" width="40" height="auto" style="margin-right: 10px;">
                    <div class="d-flex flex-column" style="line-height: 0.9; gap: 0px;">
                        <span class="fs-4 fw-bold poppins-bold text-start">CAIS</span>
                        <p class="m-0 roboto-light text-start" style="margin-top: -4px; width: 125px;">Career Alumni Information System</p>
                    </div>
                </a>
            </div>
       
        <div class="d-flex justify-content-end align-items-end">
            <!-- Menu Navigasi -->
            <ul class="text-white">
            <li><a href="/" >Beranda</a></li>
            <li><a href="/berita">Berita</a></li>
            <li><a href="/pengumuman">Pengumuman</a></li>
            <li><a href="/artikel">Artikel</a></li>
            <li><a href="/daftar_perusahaan" >Daftar Perusahaan</a></li>
            <li><a href="/lowongan_pekerjaan" >Lowongan Pekerjaan</a></li>
            <li><a href="/tracer_study">Tracer Study</a></li>
            <li><a href="/user_survey">User Survey</a></li>
            <li><a href="/tentang">Tentang</a></li>
            @guest
                <!-- When the user is not logged in -->
                <li class="me-3"><a href="{{ route('login') }}" class="text-white">Login</a></li>
            @endguest

            @auth
                <li>
                    <!-- Public Logout Form with Inline Confirmation -->
                    <form id="public-logout-form" action="{{ route('logout') }}" method="POST" 
                        class="d-flex align-items-center text-decoration-none" 
                        style="margin-left:auto; margin-right: 1%; background: none; border: none; padding: 0;">
                        @csrf
                        <button type="submit" 
                                class="btn btn-transparent d-flex align-items-center text-decoration-none" 
                                style="background: none; border: none; padding: 0;" 
                                onclick="return confirm('Are you sure you want to logout?');">
                            <span class="fw-bold" style="font-size: 14px; margin-right: 5px; color: #FFFFFF;">
                                Hi, {{ Auth::user()->name }}
                            </span>
                            <img src="{{ asset('assets/images/logout-04.png') }}" alt="Logout Icon" style="margin-left: 5px;">
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
        </div>
    </div>
</nav>
