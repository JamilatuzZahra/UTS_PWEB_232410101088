<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="logo">Novel-Ku</div>

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <div class="subtitle">Silakan login untuk melanjutkan</div>
            <form action="/dashboard" method="get">
                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
