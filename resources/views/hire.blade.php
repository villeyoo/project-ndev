<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran - NDEV Studio</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS Utama -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/hire.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="icon" href="{{ asset('assets/images/viel.png') }}" type="image/x-icon">
</head>
<body>

<!-- Menampilkan SweetAlert jika ada session 'swal' -->
@if(session('swal'))
    <script>
        window.onload = function() {
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        };
    </script>
@endif

  <!-- Navbar -->
  <header class="navbar">
    <div class="logo">Ndev Studio.</div>
    <nav id="nav-menu">
          <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
               <li class="login"><a href="{{ url('/login') }}">Login</a></li>
            </ul>
    </nav>
    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <!-- Hero Section dengan gambar viel -->
  <section class="hero">
    <div class="hero-content">
      <h1>Ndev Studio<br>Membuka pengalaman baru untuk mu!</h1>
      <p>Pilih posisi sesuai minatmu dan bergabung bersama tim kami.</p>
      <div class="btn-wrapper">
        <a href="{{ url('/cek-status') }}" class="btn">Cek Status Pendaftaran </a>
      </div>
    </div>
    <div class="hero-image">
      <img src="{{ asset('assets/images/viel.svg') }}" alt="maskot" class="maskot">
    </div>
  </section>

  <!-- Lowongan Section -->
  <div class="container">
    <h2 class="judul">Posisi Tersedia</h2>

    <!-- Card 1 -->
    @forelse ($lowongans as $lowongan)
    <div class="card-lowongan">
      <div class="card-info">
        <h3>{{ $lowongan->judul }}</h3>
        <small>
          Periode {{ \Carbon\Carbon::parse($lowongan->mulai)->format('d M Y') }}
          – {{ \Carbon\Carbon::parse($lowongan->selesai)->format('d M Y') }}
        </small>
        <p>{{ $lowongan->deskripsi }}</p>
      </div>
      <div class="card-action">
        <a href="{{ route('daftar.form') }}" class="btn-daftar">Daftar</a>
      </div>
    </div>
    @empty
    <!-- Card default jika tidak ada data -->
    <div class="card-lowongan">
      <div class="card-info">
        <h3>Tidak ada pembukaan</h3>
        <p>Saat ini belum ada posisi yang tersedia.</p>
      </div>
    </div>
    @endforelse
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
