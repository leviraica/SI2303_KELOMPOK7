<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Distribution Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            scroll-behavior: smooth;
        }

        .section {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        .image-side {
            flex: 1;
            background-size: cover;
            background-position: center;
        }

        .form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(96, 188, 234);
            flex-direction: column;
        }

        .site-title {
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            text-shadow:
                -1px -1px 0 #2c2a74,
                 1px -1px 0 #2c2a74,
                -1px  1px 0 #2c2a74,
                 1px  1px 0 #2c2a74;
        }

        .login-box {
            background-color: #fff;
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #2c2a74;
            text-align: center;
        }

        input[type=email], input[type=password] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            background-color: #2c2a74;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #1f1d50;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #2c2a74;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #2c2a74;
            font-size: 14px;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Login Pelanggan -->
<section class="section">
    <div class="image-side" style="background-image: url('https://qontak.com/wp-content/uploads/2022/10/Perilaku-Konsumen.webp');">
    </div>
    <div class="form-side" data-aos="fade-up">
        <div class="site-title">Distribution Product</div>
        <div class="login-box">
            <h2>Login</h2>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="/login/process">
                @csrf
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>

            <div class="register-link">
                <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Login Admin -->
{{-- <section class="section">
    <div class="image-side" style="background-image: url('https://static.vecteezy.com/system/resources/previews/011/431/911/large_2x/system-administrators-or-sysadmins-are-servicing-server-racks-system-administration-upkeeping-configuration-of-computer-systems-and-networks-concept-flat-modern-illustration-vector.jpg');">
    </div>
    <div class="form-side" data-aos="fade-up">
        <div class="login-box">
            <h2>Login Admin</h2>

            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email Admin" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>

            <div class="register-link">
                <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</section> --}}

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
  });
</script>
</body>
</html>
