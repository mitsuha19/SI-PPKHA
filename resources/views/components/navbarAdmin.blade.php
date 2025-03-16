<div class="combined-header-sidebar sticky-top">
  <div class="container-fluid m-0 p-0 header-admin">
    <header class="d-flex justify-content-start py-3 ps-4">
      <a class="text-white text-decoration-none">
        <div class="d-flex flex-row">
          <img src="{{ asset('assets/images/itdel.png') }}" alt="Logo" width="40" height="auto" style="margin-right: 10px;">
          <div class="d-flex flex-column" style="line-height: 0.9; gap: 0px;">
            <span class="fs-4 fw-bold poppins-bold text-center fst-italic">Admin</span>
            <p class="m-0 roboto-light text-center" style="margin-top: -4px; width: 100px; font-size:10px;">Career Alumni Information System</p>
          </div>
        </div>
      </a>
        <!-- Admin Logout Form with Inline Confirmation -->
        <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" 
        class="d-flex align-items-center text-decoration-none" 
        style="margin-left:auto; margin-right: 1%; background: none; border: none; padding: 0;">
        @csrf
        <button type="submit" 
              class="btn btn-transparent d-flex align-items-center text-decoration-none" 
              style="background: none; border: none; padding: 0;" 
              onclick="return confirm('Are you sure you want to logout?');">
          <span class="fw-bold" style="font-size: 14px; margin-right: 5px; color: #000000;">
              Hi, {{ Auth::user()->name }}
          </span>
          <img src="{{ asset('assets/images/logout-04.png') }}" 
              alt="Logout Icon" 
              style="margin-left: 5px;">
        </button>
        </form>
      </a>
    </header>
  </div>
  
  
  <div class="sidebar-admin">  
    <ul class="nav flex-column mb-auto px-3" style="padding-top: 16px">
      <li class="nav-item">
        <a href="/admin" class="nav-link active" aria-current="page">
          <i class='bx bx-home-alt'></i>
          Dashboard
        </a>
      </li>
      
      <li>
        <a href="/admin/berita" class="nav-link ">
          <i class='bx bx-info-circle' ></i>
          Berita
        </a>
      </li>
      
      <li>
        <a href="/admin/pengumuman" class="nav-link ">
          <i class='bx bx-bell' ></i>
          Pengumuman
        </a>
      </li>
      
      <li>
        <a href="/admin/artikel" class="nav-link ">
          <i class='bx bx-book' ></i>
          Artikel
        </a>
      </li>
      
      <li>
        <a href="/admin/daftar-perusahaan" class="nav-link">
          <i class='bx bx-home-circle' ></i>
          Daftar Perusahaan
        </a>
      </li>
      
      <li>
        <a href="/admin/lowongan-pekerjaan" class="nav-link">
          <i class='bx bx-briefcase-alt' ></i>
          Lowongan Pekerjaan
        </a>
      </li>
      
      <li>
        <a href="/admin/tracer-study" class="nav-link">
          <i class='bx bx-group'></i>
          Tracer Study
        </a>
      </li>
      
      <li>
        <a href="/admin/user-survey" class="nav-link">
          <i class='bx bx-notepad'></i>
          User Survey
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Hidden logout form for admin -->
<form id="admin-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<script>
  function showLogoutConfirmation(event) {
      event.preventDefault();
      if (confirm("Are you sure you want to logout?")) {
          document.getElementById('admin-logout-form').submit();
      }
  }
</script>
