<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Polisi - NDEV Studio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lowonganList.css') }}">
   <link rel="icon" href="{{ asset('assets/images/viel.png') }}" type="image/x-icon">
</head>
<body>
  <!-- Sidebar -->
  @include('sidebar')

  <div class="main">
    <header class="topbar">
      <h2>Daftar Pendaftar Polisi</h2>
      <div class="profile">
        <img src="{{ asset('assets/images/viel.png') }}" alt="profile">
        <span>Admin</span>
      </div>
    </header>

    <section class="content">
      <div class="table-container">
        <h3>List Pendaftar Polisi</h3>

        @if(session('success'))
          <div class="alert-success">
            {{ session('success') }}
          </div>
        @endif

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Username Roblox</th>
              <th>Username Discord</th>
              <th>Alasan Menjadi Polisi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($polis as $polisi)
              <tr>
                <td>{{ $polisi->id }}</td>
                <td>{{ $polisi->roblox }}</td>
                <td>{{ $polisi->discord }}</td>
                <td>{{ Str::limit($polisi->reason, 50) }}</td>
                <td>{{ ucfirst($polisi->status) }}</td>
                <td>
                  <div class="actions">
                    <a href="{{ route('polisi.show', $polisi->id) }}" class="btn btn-view">Lihat</a>
                    <a href="{{ route('polisi.verify', $polisi->id) }}" class="btn btn-verify">Verifikasi</a>
                    <form action="{{ route('polisi.destroy', $polisi->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
</body>
</html>
