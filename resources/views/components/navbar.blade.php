<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Include SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Custom Swal for Logout -->
<link rel="stylesheet" href="{{ asset('assets/css/logout.css') }}">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-md">
    <div class="container">
        <!-- Logo dan Judul -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets/images/itdel.png') }}" alt="Logo" width="40" height="auto"
                    class="me-2">
                <div class="d-flex flex-column" style="line-height: 0.9;">
                    <span class="fs-4 fw-bold poppins-bold">CAIS</span>
                    <small class="roboto-light">Career Alumni<br> Information System</small>
                </div>
            </a>
        </div>

        <!-- Hamburger Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">
                @php
                    $menus = [
                        '/' => 'Beranda',
                        '/berita' => 'Berita',
                        '/pengumuman' => 'Pengumuman',
                        '/artikel' => 'Artikel',
                        '/daftar_perusahaan' => 'Daftar Perusahaan',
                        '/lowongan_pekerjaan' => 'Lowongan Pekerjaan',
                        '/tracer_study' => 'Tracer Study',
                        '/user-survey' => 'User Survey',
                        '/tentang' => 'Tentang',
                    ];
                @endphp

                @foreach ($menus as $route => $name)
                    @php
                        $routeSegments = trim($route, '/'); // hilangkan slash depan belakang
                        $isActive = $route === '/' ? Request::is('/') : Request::is("$routeSegments*");
                    @endphp
                    <li class="nav-item position-relative">
                        <a href="{{ $route }}" class="nav-link {{ $isActive ? 'active fw-bold' : '' }}">
                            {{ $name }}
                            @if ($isActive)
                                <div class="position-absolute start-0 bottom-0 w-100">
                                    <svg width="100%" height="4" viewBox="0 0 100 4" preserveAspectRatio="none">
                                        <ellipse cx="50" cy="2" rx="50" ry="1.5"
                                            fill="#3B3B3B" />
                                        <ellipse cx="50" cy="2" rx="45" ry="1"
                                            fill="#1A1A1A" />
                                    </svg>
                                </div>
                            @endif
                        </a>
                    </li>
                @endforeach


                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <form id="public-logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="button" class="nav-link btn btn-link text-white p-0 d-flex align-items-center"
                                onclick="showLogoutConfirmation(event)">
                                <span class="fw-bold me-1">Hi, {{ Auth::user()->name }}</span>
                                <img src="{{ asset('assets/images/logout-04.png') }}" alt="Logout Icon" width="20">
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script>
    function showLogoutConfirmation(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure you want to leave?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            background: "linear-gradient(to bottom, #a2d9e0, #468c98)",
            width: '500px',
            customClass: {
                popup: 'swal-popup',
                title: 'swal-title',
                confirmButton: 'swal-confirm',
                cancelButton: 'swal-cancel'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Logged out!",
                    text: "You have successfully logged out.",
                    icon: "success",
                    background: "linear-gradient(to bottom, #a2d9e0, #468c98)",
                    confirmButtonColor: "#4aa3a3",
                    width: '500px',
                    customClass: {
                        popup: 'swal-popup',
                        title: 'swal-title',
                        confirmButton: 'swal-confirm'
                    },
                    buttonsStyling: false
                }).then(() => {
                    document.getElementById('public-logout-form').submit();
                });
            }
        });
    }
</script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
