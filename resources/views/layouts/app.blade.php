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
    body {
      margin: 0;
      font-family: "Segoe UI", Arial, sans-serif;
      background-color: #f5f9fb;
    }
    .navbar-custom {
      background: linear-gradient(90deg, #0d9fe6, #0b7cc1);
      height: 60px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 0 20px;
    }
    .navbar-brand { font-weight: bold; color: #fff !important; font-size: 18px; }
    .user-info { color: #fff; margin-right: 8px; font-size: 14px; }
    .toggle-btn { font-size: 22px; color: #fff; margin-left: 15px; cursor: pointer; }
    .logout-btn { background: none; border: none; color: #fff; font-size: 15px; cursor: pointer; }
    .logout-btn:hover { text-decoration: underline; }

    .sidebar {
      height: 100vh; width: 220px; position: fixed; top: 0; left: 0;
      background-color: #2c3e50; color: white; padding-top: 70px;
      transition: all 0.3s ease; box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }
    .sidebar a {
      display: flex; align-items: center; gap: 10px;
      padding: 12px 20px; color: #ecf0f1; text-decoration: none;
      font-size: 15px; transition: all 0.2s ease;
    }
    .sidebar a:hover { background-color: #0d9fe6; color: #fff; }
    .sidebar a.active { background-color: #0b7cc1; color: #fff; font-weight: bold; }
    .sidebar.collapsed { width: 70px; }
    .sidebar.collapsed .menu-text { display: none; }

    .content { margin-left: 220px; padding: 80px 20px 20px 20px; transition: all 0.3s ease; }
    .content.expanded { margin-left: 70px; }

    @media (max-width: 768px) {
      .sidebar { left: -220px; }
      .sidebar.active { left: 0; }
      .content { margin-left: 0; }
      .content.expanded { margin-left: 0; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-custom fixed-top d-flex justify-content-between">
    <div class="d-flex align-items-center">
      <img src="{{ asset('img/DPRD_Loteng.png') }}" alt="logo" style="height: 30px; margin-right: 10px;">
      <span class="navbar-brand">E-Aspirasi</span>
      <i class="bi bi-list toggle-btn ms-3" id="btnToggle"></i>
    </div>
    <div class="d-flex align-items-center">
      <span class="user-info">{{ Auth::user()->name ?? 'User' }}</span>
      <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
           alt="user" style="width: 32px; border-radius: 50%; margin-right: 15px;">
      <form action="{{ route('logout') }}" method="POST" class="m-0">
        @csrf
        <button type="submit" class="logout-btn">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
      </form>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    @if(Auth::user()->role === 'admin')
      <!-- Menu untuk Admin -->
      <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house"></i> <span class="menu-text">Dashboard</span>
      </a>
      <a href="{{ route('admin.aspirasi.index') }}" class="{{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">
        <i class="bi bi-list-task"></i> <span class="menu-text">Daftar Aspirasi</span>
      </a>
      <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> <span class="menu-text">Daftar Kategori</span>
      </a>
      <a href="{{ route('masyarakat.index') }}" class="{{ request()->routeIs('admin.masyarakat.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> <span class="menu-text">Daftar Masyarakat</span>
      </a>
      <a href="{{ route('anggotadprd.index') }}" class="{{ request()->routeIs('admin.anggotadprd.*') ? 'active' : '' }}">
        <i class="bi bi-person-badge"></i> <span class="menu-text">Daftar Anggota</span>
      </a>
    @else
      <!-- Menu untuk Masyarakat -->
      <a href="#" class="{{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house"></i> <span class="menu-text">Dashboard</span>
      </a>
      <a href="{{ route('masyarakat.aspirasi.create') }}" class="{{ request()->routeIs('masyarakat.aspirasi.create') ? 'active' : '' }}">
        <i class="bi bi-plus-square"></i> <span class="menu-text">Tambah Aspirasi</span>
      </a>
      <a href="{{ route('masyarakat.aspirasi.index') }}" class="{{ request()->routeIs('masyarakat.aspirasi.index') ? 'active' : '' }}">
        <i class="bi bi-list-task"></i> <span class="menu-text">Daftar Aspirasi</span>
      </a>
    @endif
  </div>

  <!-- Content -->
  <div class="content" id="content">
    @yield('content')
  </div>

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
