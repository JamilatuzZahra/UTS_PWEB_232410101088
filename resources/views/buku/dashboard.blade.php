<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="logo">Novel-Ku</div>
        </div>
        <div class="navbar-right">
            <a href="{{ url('/pengelolaan')}}">Pengelolaan</a>
            <a href="{{ url('/profile?username=' .$username)}}">Profile</a>
            <a href="{{ url('/login')}}">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <h1>Selamat Datang, {{ $username}}</h1>
        <h2>📚 Daftar Novel</h2>
        <ul class="novel-list">
            @foreach ($buku ?? [] as $item)
                <li class="novel-item">
                    <img src="{{ asset('img/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="novel-image">
                    <div class="novel-info">
                        <strong>{{ $item['judul'] }}</strong> oleh {{ $item['penulis'] }} ({{ $item['tahun'] }}) - Stok: {{ $item['stok'] }}
                    <div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
