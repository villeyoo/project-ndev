<aside class="sidebar">
  <div class="logo">Ndev Studio</div>
  <ul class="menu">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('lowongan.create') }}">Tambah Lowongan</a></li>
    <li><a href="{{ route('lowongan.list') }}">List Lowongan</a></li>
    <li><a href="{{ route('scripter.index') }}">Scripter</a></li>
    <li><a href="{{ route('polisi.index') }}">Polisi</a></li>
    <li><a href="{{ route('content-creator.index') }}">Content Creator</a></li>
   <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-logout">Logout</button>
</form>
  </ul>
</aside>

<style>
  /* Styling untuk tombol logout */
.btn-logout {
    background-color: #ff4d4d; /* Warna merah */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-logout:hover {
    background-color: #ff1a1a; /* Merah lebih gelap saat hover */
}

</style>
