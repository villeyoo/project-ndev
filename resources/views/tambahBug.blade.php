<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Bug - NDEV Studio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/tambahLow.css') }}">
</head>
<body>
  <!-- Sidebar -->
  @include('sidebar')

  <!-- Main Content -->
  <div class="main">
    <!-- Navbar -->
    <header class="topbar">
      <h2>Tambah Bug</h2>
      <div class="profile">
        <img src="{{ asset('assets/images/viel.png') }}" alt="profile">
        <span>Admin</span>
      </div>
    </header>

    <!-- Content -->
    <section class="content">
      <div class="form-container">
        <h3>Form Laporan Bug</h3> 
        <form action="{{ route('bug.create') }}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="judul">Judul Bug</label>
            <input type="text" id="judul" name="judul" placeholder="Contoh: Error di halaman login" required>
          </div>

          <div class="form-group">
            <label for="prioritas">Prioritas</label>
            <select id="prioritas" name="prioritas" required>
              <option value="">-- Pilih Prioritas --</option>
              <option value="Low">Low</option>
              <option value="Medium">Medium</option>
              <option value="High">High</option>
              <option value="Critical">Critical</option>
            </select>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi Bug</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Jelaskan langkah reproduksi, pesan error, dsb." required></textarea>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Ditemukan</label>
            <input type="date" id="tanggal" name="tanggal" required>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-submit">Simpan</button>
            <a href="{{ route('dashboard') }}">
              <button type="button" class="btn-back">Kembali</button>
            </a>
          </div>
        </form>
      </div>
    </section>
  </div>
</body>
</html>
