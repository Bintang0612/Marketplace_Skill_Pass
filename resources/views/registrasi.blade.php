<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #eaf7ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background: #fff;
      width: 400px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      overflow: hidden;
      text-align: center;
    }

    .card-header {
      background: linear-gradient(to right, #2d7dff, #4fa3ff);
      color: #fff;
      padding: 20px 10px;
      font-size: 20px;
      font-weight: bold;
      border-bottom-left-radius: 50% 20%;
      border-bottom-right-radius: 50% 20%;
    }

    .card-body {
      padding: 20px;
    }

    .card-body h2 {
      margin-bottom: 20px;
      font-size: 22px;
      font-weight: bold;
      color: #333;
    }

    .form-input {
      width: 95%;
      padding: 7px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .btn {
      background: #2d7dff;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn:hover {
      background: #0056d6;
    }

    .btn-login {
      display: block;
      margin-top: 12px;
      padding: 10px;
      width: 93%;
      background: transparent;
      border: 2px solid #2d7dff;
      color: #2d7dff;
      border-radius: 6px;
      font-size: 15px;
      font-weight: bold;
      text-decoration: none;
    }

    .btn-login:hover {
      background: #2d7dff;
      color: white;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="card-header">
      Marketplace
    </div>

    <div class="card-body">
      <h2>Register</h2>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

      <form action="{{ route('registrasi.store') }}" method="POST">
        @csrf

        <input type="text" name="nama" class="form-input" placeholder="Nama Lengkap" required>
        <input type="text" name="kontak" class="form-input" placeholder="Kontak" required>
        <input type="text" name="username" class="form-input" placeholder="Username" required>
        <input type="password" name="password" class="form-input" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-input" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn">Daftar</button>

      </form>

      <a href="{{ route('login') }}" class="btn-login">Sudah punya akun? Login</a>
    </div>
  </div>

</body>
</html>
