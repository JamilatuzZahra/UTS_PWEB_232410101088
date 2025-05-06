<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengelolaan Buku</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="logo">Novel-Ku</div>
        </div>
        <div class="navbar-right">
            <a href="{{ url('/dashboard?username=' . $username) }}">Dashboard</a>
            <a href="{{ url('/profile?username=' . $username) }}">Profile</a>
            <a href="{{ url('/login') }}">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <h1>Pengelolaan Novel</h1>
        <h2>📚 Daftar Novel</h2>
        <ul class="novel-list">
            @foreach ($buku ?? [] as $item)
                <li class="novel-item">
                    <img src="{{ asset('img/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="novel-image small">
                    <div class="novel-info">
                        <strong>{{ $item['judul'] }}</strong> oleh {{ $item['penulis'] }} ({{ $item['tahun'] }}) - Stok: {{ $item['stok'] }}
                    </div>
                </li>
            @endforeach
        </ul>

        <h2>➕ Tambah Data Novel</h2>
        <form action="{{ url('/pengelolaan/tambah') }}" method="POST" enctype="multipart/form-data" class="tambah-form">
            @csrf
            <input type="text" name="judul" placeholder="Judul" required>
            <input type="text" name="penulis" placeholder="Penulis" required>
            <input type="number" name="tahun" placeholder="Tahun" required>
            <input type="number" name="stok" placeholder="Stok" required>
            <input type="file" name="gambar" accept="image/*" required>
            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>
