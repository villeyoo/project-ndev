<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Lowongan - Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lowonganList.css') }}">
</head>
<body>
  <div class="main-layout">

    {{-- Sidebar dipanggil --}}
    @include('sidebar')

    <!-- Main Content -->
    <div class="main">
      <header class="topbar">
        <h2>Daftar Lowongan</h2>
        <div class="profile">
          <img src="{{ asset('assets/images/viel.png') }}" alt="profile">
          <span>Admin</span>
        </div>
      </header>

      <section class="content">
        <div class="table-container">
          <h3>List Lowongan</h3>

          @if(session('success'))
            <div class="alert-success">
              {{ session('success') }}
            </div>
          @endif

          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lowongans as $lowongan)
                <tr>
                  <td>{{ $lowongan->id }}</td>
                  <td>{{ $lowongan->judul }}</td>
                  <td>{{ $lowongan->mulai }}</td>
                  <td>{{ $lowongan->selesai }}</td>
                  <td>{{ Str::limit($lowongan->deskripsi, 50) }}</td>
                  <td>
                    <div class="actions">
                      <a href="{{ route('lowongan.edit', $lowongan->id) }}" class="btn btn-edit">Edit</a>
                      <form action="{{ route('lowongan.destroy', $lowongan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
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
  </div>
</body>

</html>
