<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      padding-top: 10px; /* logo lebih ke atas */
      background-color: #fff;
    }

    .login-container {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px; /* diperbesar */
      text-align: center;
      border: 2px solid #e6e6e6;
      overflow: hidden;
    }

    .login-header {
      background: #0097a7;
      color: white;
      padding: 20px; /* diperbesar */
      font-size: 22px; /* diperbesar */
      font-weight: bold;
      text-align: center;
    }

    .login-body {
      padding: 30px; /* diperbesar */
    }

    input {
      width: 90%;
      padding: 14px; /* diperbesar */
      margin: 12px 0;
      border: none;
      background: #f0f0f0;
      border-radius: 8px;
      font-size: 16px; /* diperbesar */
    }

    button {
      width: 100%;
      padding: 14px;
      background: #0097a7;
      color: white;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-size: 18px; /* diperbesar */
      margin-top: 15px;
      font-weight: bold;
    }

    button:hover {
      background: #007a85;
    }

    .small-note {
      margin-top: 12px;
      font-size: 14px; /* diperbesar */
      color: green;
    }

    .register-link {
      margin-top: 15px;
      font-size: 15px; /* diperbesar */
    }

    .logo {
      text-align: center;
      margin-bottom: 20px; /* diperbesar */
    }

    .logo img {
      width: 120px; /* diperbesar */
    }
  </style>
</head>
<body>
  <div>
    <!-- Logo -->
    <div class="logo">
      <img src="{{ asset('asset/img/dprd_Loteng.png') }}" alt="Logo">
    </div>

    <!-- Kotak Login -->
    <div class="login-container">
      <div class="login-header">Login</div>
      <div class="login-body">
        <!-- Pesan error (Laravel Blade) -->
        @if ($errors->any())
          <div class="error" style="color: red; font-size: 15px; margin-bottom: 12px;">
            <strong>Error:</strong> {{ $errors->first() }}
          </div>
        @endif

        <form action="{{ route('login') }}" method="post">
          @csrf
          <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="Email">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <button type="submit">Login</button>
          <p class="register-link">Belum memiliki akun? <a href="{{ route('register') }}">Register</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
