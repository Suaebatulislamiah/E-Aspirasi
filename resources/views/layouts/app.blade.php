<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Aspirasi - @yield('title')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background-color: #f5f9fb; }
    .navbar-custom { background: linear-gradient(90deg, #0d9fe6, #0b7cc1); height: 60px; box-shadow: 0 2px 6px rgba(0,0,0,0.15); padding: 0 20px; }
    .navbar-brand { font-weight: bold; color: #fff !important; font-size: 18px; }
    .toggle-btn { font-size: 22px; color: #fff; margin-left: 15px; cursor: pointer; }
    .sidebar { height: 100vh; width: 220px; position: fixed; top: 0; left: 0; background-color: #2c3e50; color: white; padding-top: 70px; transition: all 0.3s ease; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
    .sidebar a { display: flex; align-items: center; gap: 10px; padding: 12px 20px; color: #ecf0f1; text-decoration: none; font-size: 15px; transition: all 0.2s ease; }
    .sidebar a:hover { background-color: #0d9fe6; color: #fff; }
    .sidebar a.active { background-color: #0b7cc1; color: #fff; font-weight: bold; }
    .sidebar.collapsed { width: 70px; }
    .sidebar.collapsed .menu-text { display: none; }
    .content { margin-left: 220px; padding: 80px 20px 20px 20px; transition: all 0.3s ease; }
    .content.expanded { margin-left: 70px; }
    @media (max-width: 768px) { .sidebar { left: -220px; } .sidebar.active { left: 0; } .content { margin-left: 0; } .content.expanded { margin-left: 0; } }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-custom fixed-top d-flex justify-content-between">
    <div class="d-flex align-items-center">
      <img src="{{ asset('asset/img/dprd_Loteng.png') }}" alt="logo" style="height: 30px; margin-right: 10px;">
      <span class="navbar-brand">E-Aspirasi</span>
      <i class="bi bi-list toggle-btn ms-3" id="btnToggle"></i>
    </div>

    <!-- Dropdown Profil -->
    <div class="dropdown">
      <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
         href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ Auth::user()->profile_photo_url ?? asset('img/default-profile.png') }}" 
             alt="user" style="width: 34px; border-radius: 50%; margin-right: 8px;">
        <span>{{ Auth::user()->name ?? 'User' }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
        @if(Auth::check() && Auth::user()->role === 'Masyarakat')
          <li>
            <a class="dropdown-item" href="{{ route('masyarakat.edit', Auth::user()->id) }}">
              <i class="bi bi-person-circle"></i> Edit Profil
            </a>
          </li>
        @endif

        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    @if(Auth::check() && Auth::user()->role === 'admin')
      <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-house"></i> <span class="menu-text">Dashboard</span></a>
      <a href="{{ route('admin.aspirasi.index') }}" class="{{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}"><i class="bi bi-list-task"></i> <span class="menu-text">Daftar Aspirasi</span></a>
      <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}"><i class="bi bi-tags"></i> <span class="menu-text">Daftar Kategori</span></a>
      <a href="{{ route('masyarakat.index') }}" class="{{ request()->routeIs('admin.masyarakat.*') ? 'active' : '' }}"><i class="bi bi-people"></i> <span class="menu-text">Daftar Masyarakat</span></a>
      <a href="{{ route('anggotadprd.index') }}" class="{{ request()->routeIs('admin.anggotadprd.*') ? 'active' : '' }}"><i class="bi bi-person-badge"></i> <span class="menu-text">Daftar Anggota</span></a>
      <a href="{{ route('kecamatan.index') }}" class="{{ request()->routeIs('admin.kecamatan.*') ? 'active' : '' }}"><i class="bi bi-geo-alt"></i> <span class="menu-text">Daftar Kecamatan</span></a>
      <a href="{{ route('desa.index') }}" class="{{ request()->routeIs('admin.desa.*') ? 'active' : '' }}"><i class="bi bi-building"></i> <span class="menu-text">Daftar Desa</span></a>
    @else
      <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}"><i class="bi bi-house"></i> <span class="menu-text">Dashboard</span></a>
      <a href="{{ route('masyarakat.aspirasi.create') }}" class="{{ request()->routeIs('masyarakat.aspirasi.create') ? 'active' : '' }}"><i class="bi bi-plus-square"></i> <span class="menu-text">Tambah Aspirasi</span></a>
      <a href="{{ route('masyarakat.aspirasi.index') }}" class="{{ request()->routeIs('masyarakat.aspirasi.index') ? 'active' : '' }}"><i class="bi bi-list-task"></i> <span class="menu-text">Daftar Aspirasi</span></a>
    @endif
  </div>

  <!-- Content -->
  <div class="content" id="content">
    @yield('content')
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    const btnToggle = document.getElementById("btnToggle");

    btnToggle.addEventListener("click", function() {
      if (window.innerWidth <= 768) {
        sidebar.classList.toggle("active");
      } else {
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("expanded");
      }
    });
  </script>
</body>
</html>
