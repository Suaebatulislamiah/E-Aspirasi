<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
    }

    .register-container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.12);
      width: 100%;
      max-width: 400px; /* diperkecil dari 420px */
      text-align: center;
      border: 2px solid #e6e6e6;
      overflow: hidden;
    }

    .register-header {
      background: #0097a7;
      color: white;
      padding: 18px; /* diperkecil */
      font-size: 20px; /* diperkecil */
      font-weight: bold;
      text-align: center;
    }

    .register-body {
      padding: 28px; /* diperkecil */
    }

    input {
      width: 90%;
      padding: 12px; /* diperkecil */
      margin: 10px 0;
      border: none;
      background: #f0f0f0;
      border-radius: 6px;
      font-size: 14px; /* diperkecil */
    }

    button {
      width: 100%;
      padding: 12px;
      background: #0097a7;
      color: white;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 16px; /* diperkecil */
      margin-top: 12px;
      font-weight: bold;
    }

    button:hover {
      background: #007a85;
    }

    .register-link {
      margin-top: 12px;
      font-size: 14px;
    }

    .logo {
      text-align: center;
      margin-bottom: 18px;
    }

    .logo img {
      width: 100px; /* diperkecil dari 120px */
    }

    .error {
      color: red;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .success {
      color: green;
      margin-bottom: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div>
    <!-- Logo -->
    <div class="logo">
      <img src="img/DPRD_Loteng.png" alt="DPRD_Loteng"> <!-- ganti sesuai path logo -->
    </div>

    <!-- Kotak Register -->
    <div class="register-container">
      <div class="register-header">Register</div>
      <div class="register-body">

        @if (session('success'))
          <div class="success">
            {{ session('success') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="error">
            <strong>Error:</strong> {{ $errors->first() }}
          </div>
        @endif

        <form action="{{ route('register') }}" method="post">
          @csrf
          <input type="text" name="name" id="name" placeholder="Nama Lengkap" required>
          <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="Email">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
          <button type="submit">Register</button>
          <p class="register-link">Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
