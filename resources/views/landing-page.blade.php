<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pimpinan DPRD Lombok Tengah</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f8fafc;
    }
    .carousel-item img {
      object-fit: cover;
      height: 700px;
      filter: brightness(90%);
    }
    .leader-card {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .leader-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 12px rgba(0,0,0,0.2);
    }
    .leader-card img {
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }
    .leader-name {
      font-weight: bold;
      margin-top: 10px;
      font-size: 1.1rem;
    }
    .leader-title {
      font-size: 0.95rem;
      color: #666;
    }
    .visitor-box {
      border: 1px solid #444;
      padding: 15px;
      border-radius: 10px;
      background: #1e272e;
      color: #f1f1f1;
      box-shadow: inset 0 0 8px rgba(0,0,0,0.3);
    }
    .visitor-box #live-clock {
      font-size: 1.8rem;
      font-weight: bold;
      color: #0d6efd;
    }
    .visitor-box #live-date {
      color: #aaa;
      margin-bottom: 6px;
      display: block;
    }
    .active-days {
      font-size: 0.95rem;
      color: #27ae60;
      font-weight: 500;
    }
    .social-icons i {
      font-size: 1.6rem;
      margin-right: 8px;
    }
    .social-icons a {
      display: block;
      margin: 8px 0;
      color: #fff;
      text-decoration: none;
      transition: all 0.3s;
    }
    .social-icons a:hover {
      color: #0d9fe6;
      transform: translateX(5px);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">DPRD Lombok Tengah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main style="margin-top: 80px;">

    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('asset/img/propil_dewan.jpg') }}" class="d-block w-100" alt="Slide DPRD">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('asset/img/bupati.jpeg') }}" class="d-block w-100" alt="Bupati">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- Section Pimpinan DPRD -->
    <div class="container text-center mb-5">
      <h3 class="mb-4 fw-bold text-dark">PIMPINAN DPRD KABUPATEN LOMBOK TENGAH <br> MASA JABATAN 2024-2029</h3>
      <div class="row g-4">
        <div class="col-md-3 col-6">
          <div class="leader-card">
            <img src="{{ asset('asset/img/ketua_dprd.jpg') }}" class="img-fluid" alt="Ketua DPRD">
            <div class="leader-name">L. RAMDAN, S.Ag</div>
            <div class="leader-title">Ketua DPRD</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="leader-card">
            <img src="{{ asset('asset/img/WAKIL_1_dprd.jpg') }}" class="img-fluid" alt="Wakil Ketua I">
            <div class="leader-name">H. L. AHMAD RUMIAWAN, S.Sos</div>
            <div class="leader-title">Wakil Ketua I</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="leader-card">
            <img src="{{ asset('asset/img/WK2_dprd.jpg') }}" class="img-fluid" alt="Wakil Ketua II">
            <div class="leader-name">H. L. SARIJAN, S.H</div>
            <div class="leader-title">Wakil Ketua II</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="leader-card">
            <img src="{{ asset('asset/img/wk3_dprd.jpg') }}" class="img-fluid" alt="Wakil Ketua III">
            <div class="leader-name">H. UHIBBUSSA ADI, S.T</div>
            <div class="leader-title">Wakil Ketua III</div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- Footer Kontak -->
  <footer class="bg-light text-dark py-4 border-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 text-center mb-3 mb-md-0">
          <img src="img/gedung_dprd.jpg" alt="DPRD Lombok Tengah" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-9">
          <div class="row text-center text-md-start">
            <div class="col-md-4 mb-3 mb-md-0">
              <i class="bi bi-telephone fs-4 d-block mb-2"></i>
              <small class="d-block fw-bold">TELP</small>
              <span>(0370) 65507</span>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <i class="bi bi-envelope fs-4 d-block mb-2"></i>
              <small class="d-block fw-bold">EMAIL</small>
              <span>humas.dprd.lth@gmail.com</span>
            </div>
            <div class="col-md-4">
              <i class="bi bi-clock fs-4 d-block mb-2"></i>
              <small class="d-block fw-bold">JAM KERJA</small>
              <span>Senin - Jum'at: 07:30 - 16:30 WITA</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Footer Kedua (Map, Jam Aktif, Subscribe) -->
  <footer class="bg-dark text-light py-5">
    <div class="container">
      <div class="row">
        
       <!-- Map -->
      <div class="col-md-4 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3">DPRD KABUPATEN LOMBOK TENGAH</h6>
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.290295977184!2d116.277729!3d-8.692656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf4fc10d1bb9%3A0x88c8cc5d07a9db36!2sKantor%20DPRD%20Lombok%20Tengah!5e0!3m2!1sid!2sid!4v1693208888888!5m2!1sid!2sid" 
          width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <!-- Jam Aktif -->
      <div class="col-md-4 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3">JAM AKTIF</h6>
        <div class="visitor-box text-center">
          <div id="live-clock">00:00:00</div>
          <small id="live-date"></small>
          <div class="active-days">
            Senin – Jumat <br>
            <span>07:30 – 16:30 WITA</span>
          </div>
        </div>
      </div>

      <!-- Subscribe -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3">SUBSCRIBE CHANNEL KAMI</h6>
        <div class="social-icons">
          <a href="https://www.facebook.com/profile.php?id=100067678361705" target="_blank">
            <i class="bi bi-facebook"></i> Like us on Facebook
          </a>
          <a href="https://www.youtube.com/@humasdprdkabupatenlombokte5630" target="_blank">
            <i class="bi bi-youtube"></i> Subscribe to Youtube
          </a>
          <a href="https://dprd.lomboktengahkab.go.id" target="_blank">
            <i class="bi bi-globe"></i> Kunjungi Website Kami
          </a>
        </div>
      </div>
    </div>

    <div class="text-center pt-4 mt-3 border-top border-secondary">
      <p class="mb-0">&copy; 2025 DPRD Lombok Tengah</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script Jam Real-time -->
  <script>
    function updateClock() {
      const now = new Date();
      const time = now.toLocaleTimeString('id-ID', { hour12: false });
      const date = now.toLocaleDateString('id-ID', { 
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' 
      });

      document.getElementById('live-clock').textContent = time;
      document.getElementById('live-date').textContent = date;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>
</html>
