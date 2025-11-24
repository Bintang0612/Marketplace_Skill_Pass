<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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

    .forgot {
      display: block;
      margin-bottom: 20px;
      font-size: 13px;
      color: #555;
      text-decoration: none;
      text-align: left;
    }

    .forgot:hover {
      color: #2d7dff;
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
    .btn-register {
        display: block;
        margin-top: 12px;
        padding: 12px;
        width: 93%;
        background: transparent;
        border: 2px solid #2d7dff;
        color: #2d7dff;
        border-radius: 6px;
        font-size: 15px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-register:hover {
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
      <h2>Login</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

      <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        <div class="mb-3 mt-5" style="text-align: left">
            <label for="username">Username</label>
            <input type="username" class="form-input" id="username" placeholder="Enter Username" name="username">
        </div>
        <div class="mb-3" style="text-align: left">
            <label for="password">Password</label>
            <input type="password" class="form-input" id="password" placeholder="Enter Password" name="password">
        </div>
            <button type="submit" class="btn">Login</button>
      </form>
        <!-- BUTTON DAFTAR -->
        <a href="{{ route('regist') }}" class="btn-register">
            Daftar Akun
        </a>
        </div>
    </div>
  </div>
</body>
</html>
