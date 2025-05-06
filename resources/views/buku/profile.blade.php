<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="logo">Novel-Ku</div>
        </div>
        <div class="navbar-right">
            <a href="{{ url('/dashboard?username=' . $username)}}">Dashboard</a>
            <a href="{{ url('/login')}}">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <h1>Halo, ini halaman profil</h1>
        <p>Username: {{ $profile['nama']}}</p>
        <p>Email: {{ $profile['email']}}</p>

        <button onclick="toggleForm()" style="margin-bottom: 15px">Edit Profil</button>

        <div id="editForm" style="display: none;">
            <form action="{{ url('/profile/update') }}" method="POST">
                @csrf
                <input type="text" name="nama" value="{{ $profile['nama'] }}" required>
                <input type="email" name="email" value="{{ $profile['email'] }}" required>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById('editForm');
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }
    </script>
    </div>
</body>
</html>
