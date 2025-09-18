<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - NDEV Studio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>
  <!-- Sidebar -->
    @include('sidebar')

  <!-- Main Content -->
  <div class="main">
    <!-- Navbar -->
    <header class="topbar">
      <h2>Dashboard</h2>
      <div class="profile">
        <img src="{{ asset('assets/images/viel.png') }}" alt="profile">
        <span>Admin</span>
      </div>
    </header>

    <!-- Content -->
    <section class="content">
      <div class="cards">
        <div class="card">
          <h3>Total Lowongan</h3>
           <p class="count">{{ $totalLowongan }}</p>
        </div>
        <div class="card">
          <h3>Pengajuan Content Creator</h3>
            <p class="count">{{ $totalContentCreator }}</p>
        </div>
          <div class="card">
          <h3>Pengajuan Scripter</h3>
            <p class="count">{{ $totalScripter }}</p>
        </div>
          <div class="card">
          <h3>Pengajuan Polisi</h3>
            <p class="count">{{ $totalPolisi }}</p>
        </div>
      </div>

      <div class="panel">
        <h3>Aktivitas Terbaru</h3>
        <ul>
          
        </ul>
      </div>
    </section>
  </div>
</body>
</html>
