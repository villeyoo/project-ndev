<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - NDEV Studio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>

  <div class="login-container">
    <div class="login-card">
     <div class="logo">
    <img src="{{ asset('assets/images/viel.svg') }}" alt="Logo" width="100" height="100">
    </div>

      <h2>Login</h2>
      <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required placeholder="Enter your username">
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
  </div>

</body>
</html>
