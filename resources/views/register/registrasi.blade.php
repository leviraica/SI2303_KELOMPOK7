<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Distribution Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        /* Gunakan style yang mirip login */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: rgb(96, 188, 234); /* Change background color to match login page */
        }

        .register-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: rgb(49, 46, 133);
        }

        input, select {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: rgb(38, 38, 117);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(37, 22, 86);
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #2c2a74;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        #adminCodeField {
            display: none;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Daftar</h2>
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="/register">
            {{-- @method('POST') --}}
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            
            <select name="role" id="roleSelect" onchange="toggleAdminCode()">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>

            <div id="adminCodeField">
                <input type="password" name="admin_code" placeholder="Kode Admin">
            </div>

            <button type="submit">Daftar</button>
        </form>
        
        <div class="login-link">
            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
        </div>
    </div>

    <script>
        function toggleAdminCode() {
            const roleSelect = document.getElementById('roleSelect');
            const adminCodeField = document.getElementById('adminCodeField');
            
            if (roleSelect.value === 'admin') {
                adminCodeField.style.display = 'block';
            } else {
                adminCodeField.style.display = 'none';
            }
        }
    </script>

</body>
</html>



