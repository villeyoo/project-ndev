<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NDEV Studio</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cekstatus.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
     <link rel="icon" href="{{ asset('assets/images/viel.png') }}" type="image/x-icon">
</head>
<body>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Cek status pendaftaran<br></h1>
            <p>masukan username discord mu dengan benar saat kamu mendaftar</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/images/viel.svg') }}" alt="maskot" class="maskot">
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
      <div class="status-container">
        <h3>Masukkan Username Discord untuk Cek Status Pendaftaran</h3>

        @if(session('error'))
          <div class="alert-error">
            {{ session('error') }}
          </div>
        @endif

        <form action="{{ route('cek-status.check') }}" method="POST">
          @csrf
          <label for="discord">Username Discord:</label>
          <input type="text" name="discord" id="discord" required>
          <button type="submit" class="btn btn-confirm">Cek Status</button>
        </form>

        @isset($status)
          <div class="status-result @if($status == 'pending') pending @elseif($status == 'diterima') accepted @elseif($status == 'ditolak') rejected @endif">
          </div>
        @endisset
      </div>
    </section>

    <!-- Pengumuman Card -->
 @isset($status)
<section class="announcement">
    <div class="announcement-container @if($status == 'pending') pending @elseif($status == 'diterima') accepted @elseif($status == 'ditolak') rejected @endif">
        <h3>Pengumuman</h3>
        <p><strong>{{ ucfirst($discord) }}</strong></p>

        <!-- Tampilkan pesan berbeda berdasarkan status -->
        @if($status == 'diterima')
            <p>Selamat, pendaftaran Anda <strong>{{ ucfirst($status) }}</strong> menjadi <strong>{{ $role }}</strong>!</p>
        @elseif($status == 'ditolak')
            <p>Mohon maaf, pendaftaran Anda <strong>{{ ucfirst($status) }}</strong> menjadi <strong>{{ $role }}</strong>.</p>
        @else
            <p>Pendaftaran Anda masih <strong>{{ ucfirst($status) }}</strong>.</p>
        @endif
    </div>
</section>
@endisset


    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
