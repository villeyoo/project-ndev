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
  <h3>Daftar Bug</h3>
  <ul class="bug-list">
    @forelse($bugs as $bug)
      <li>
        <div>
          <strong>{{ $bug->judul }}</strong>
          <div class="desc">{{ $bug->deskripsi }}</div>
          <small class="date">
            Prioritas: <span class="prio {{ strtolower($bug->prioritas) }}">
              {{ $bug->prioritas }}
            </span> |
            {{ \Carbon\Carbon::parse($bug->tanggal)->format('d M Y') }}
          </small>
        </div>
        <div class="bug-actions">
            <form action="{{ route('bugs.delete', $bug->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="done" onclick="return confirm('Tandai selesai & hapus?')">
                    Selesai
                </button>
            </form>
        </div>

      </li>
    @empty
      <li>Tidak ada bug yang tercatat.</li>
    @endforelse
  </ul>
</div>

          
        </ul>
      </div>
    </section>
  </div>
</body>
</html>
