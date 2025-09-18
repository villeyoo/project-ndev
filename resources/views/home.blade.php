<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NDEV Studio</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/images/viel.png') }}" type="image/png">
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
            <h1>Selamat Datang Di<br>Website Resmi NDEV STUDIO</h1>
            <div class="btn-wrapper">
                <a href="{{ url('/hire') }}" class="btn">Request / Daftar </a>
                <a href="https://www.roblox.com/games/98998191230286/DESA-INDO" target="_blank" class="btn">
                    Desa Indo <img src="{{ asset('assets/images/viel.png') }}" alt="icon">
                </a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/images/viel.svg') }}" alt="maskot" class="maskot">
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-box">
            <p>GAME PUBLISH</p>
            <h2>1</h2>
        </div>
        <div class="stat-box">
            <p>SCRIPTER</p>
            <h2>1</h2>
        </div>
        <div class="stat-box">
            <p>OPEN TO WORK</p>
            <h2>YES</h2>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section class="about">
        <h2>Tentang Kami.</h2>
        <p>Kami membuat game di Roblox dan Unity, dan selalu antusias mengeksplorasi ide-ide baru. Selain menciptakan game sendiri, kami juga terbuka untuk bekerja sama dan membantu mengembangkan konsep game Anda menjadi pengalaman yang seru dan menyenangkan bagi para pemain.</p>
    </section>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
