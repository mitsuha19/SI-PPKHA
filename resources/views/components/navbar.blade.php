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
                <li><a href="/">Beranda</a></li>
                <li><a href="/berita">Berita</a></li>
                <li><a href="/pengumuman">Pengumuman</a></li>
                <li><a href="/artikel">Artikel</a></li>
                <li><a href="/daftar_perusahaan">Daftar Perusahaan</a></li>
                <li><a href="/lowongan_pekerjaan">Lowongan Pekerjaan</a></li>
                <li><a href="/tracer_study">Tracer Study</a></li>
                <li><a href="/user_survey">User Survey</a></li>
                <li><a href="/tentang">Tentang</a></li>

                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="inline-block px-5 py-1.5 text-white border border-transparent hover:border-white rounded-sm text-sm leading-normal">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="inline-block px-5 py-1.5 text-white border border-transparent hover:border-white rounded-sm text-sm leading-normal">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" >
                                Login
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" >
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>