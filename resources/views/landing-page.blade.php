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
    .carousel-item img {
      object-fit: cover;
      height: 700px;
    }
    .leader-card img {
      height: 350px;
      object-fit: cover;
    }
    .leader-name {
      font-weight: bold;
      margin-top: 10px;
    }
    .leader-title {
      font-size: 0.95rem;
      color: #555;
    }
    .visitor-box {
      border: 1px solid #666;
      padding: 10px;
      border-radius: 5px;
      background: #222;
      color: #ddd;
    }
    .visitor-box div {
      margin-bottom: 8px;
    }
    .visitor-box span {
      font-weight: bold;
      color: #27ae60;
    }
    .social-icons i {
      font-size: 2rem;
      margin-right: 10px;
    }
    .social-icons a {
      display: inline-block;
      margin: 0 10px;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">DPRD Lombok Tengah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
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
          <img src="img/propil_dewan.jpg" class="d-block w-100" alt="Slide DPRD">
        </div>
        <div class="carousel-item">
          <img src="img/bupati.jpeg" class="d-block w-100" alt="Bupati">
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
      <h3 class="mb-4">PIMPINAN DPRD KABUPATEN LOMBOK TENGAH MASA JABATAN 2024-2029</h3>
      <div class="row">
        <div class="col-md-3 col-6 mb-4">
          <div class="leader-card">
            <img src="img/ketua_dprd.jpg" class="img-fluid img-thumbnail" alt="Ketua DPRD">
            <div class="leader-name">L. RAMDAN, S.Ag</div>
            <div class="leader-title">Ketua DPRD</div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="leader-card">
            <img src="img/wakil1.jpg" class="img-fluid img-thumbnail" alt="Wakil Ketua I">
            <div class="leader-name">H. L. AHMAD RUMIAWAN, S.Sos</div>
            <div class="leader-title">Wakil Ketua I</div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="leader-card">
            <img src="img/wakil2.jpg" class="img-fluid img-thumbnail" alt="Wakil Ketua II">
            <div class="leader-name">H. L. SARIJAN, S.H</div>
            <div class="leader-title">Wakil Ketua II</div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="leader-card">
            <img src="img/wakil3.jpg" class="img-fluid img-thumbnail" alt="Wakil Ketua III">
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

  <!-- Footer Kedua (Map, Visitor, Subscribe) -->
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


        <!-- Visitor -->
        <div class="col-md-4 mb-4 mb-md-0">
          <h6 class="fw-bold mb-3">PENGUNJUNG</h6>
          <div class="visitor-box">
            <div>User Online : <span>1</span></div>
            <div>Pengunjung hari ini : <span>50</span></div>
            <div>Hits hari ini : <span>118</span></div>
            <div>Total pengunjung : <span>101,579</span></div>
          </div>
        </div>

        <!-- Subscribe -->
        <div class="col-md-4">
          <h6 class="fw-bold mb-3">SUBSCRIBE CHANNEL KAMI</h6>
          <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=100067678361705" target="_blank">
              <i class="bi bi-facebook"></i> <span>Like us on Facebook</span>
            </a><br>

            <a href="https://www.youtube.com/@humasdprdkabupatenlombokte5630" target="_blank">
              <i class="bi bi-youtube"></i> <span>Subscribe to Youtube</span>
            </a><br>

            <a href="https://dprd.lomboktengahkab.go.id" target="_blank">
              <i class="bi bi-globe"></i> <span>Kunjungi Website Kami</span>
            </a>

          </div>
        </div>
      </div>

      <div class="text-center pt-4 mt-3 border-top border-secondary">
        <p class="mb-0">&copy; 2025 DPRD Lombok Tengah</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
