<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        $buku = [
            [
                'judul' => '3726 MDPL',
                'penulis' => 'Nurwina Sari',
                'tahun' => 2024,
                'stok' => 5,
                'gambar' => '3726 mdpl.jpeg'
            ],
            [
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S.Chudori',
                'tahun' => 2017,
                'stok' => 10,
                'gambar' => 'laut Bercerita.jpeg'
            ],
            [
                'judul' => 'Malioboro at Midnight',
                'penulis' => 'Skysphire',
                'tahun' => 2023,
                'stok' => 20,
                'gambar' => 'Midnight.jpeg'
            ]
        ];

        return view('buku.dashboard', compact('buku', 'username'));
    }


    public function pengelolaan()
    {
        $username = request()->query('username', 'admin');

        $buku = session('buku', [
            [
                'judul' => '3726 MDPL',
                'penulis' => 'Nurwina Sari',
                'tahun' => 2024,
                'stok' => 5,
                'gambar' => '3726 mdpl.jpeg'
            ],
            [
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S.Chudori',
                'tahun' => 2017,
                'stok' => 10,
                'gambar' => 'laut Bercerita.jpeg'
            ],
            [
                'judul' => 'Malioboro at Midnight',
                'penulis' => 'Skysphire',
                'tahun' => 2023,
                'stok' => 20,
                'gambar' => 'Midnight.jpeg'
            ]
        ]);

        return view('buku.pengelolaan', compact('buku', 'username'));
    }

    public function tambahBuku(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'tahun' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $filename = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $filename);

        $buku = session('buku', [
            [
                'judul' => '3726 MDPL',
                'penulis' => 'Nurwina Sari',
                'tahun' => 2024,
                'stok' => 5,
                'gambar' => '3726 mdpl.jpeg'
            ],
            [
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S.Chudori',
                'tahun' => 2017,
                'stok' => 10,
                'gambar' => 'laut Bercerita.jpeg'
            ],
            [
                'judul' => 'Malioboro at Midnight',
                'penulis' => 'Skysphire',
                'tahun' => 2023,
                'stok' => 20,
                'gambar' => 'Midnight.jpeg'
            ]
        ]);

        $buku[] = [
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'tahun' => $validated['tahun'],
            'stok' => $validated['stok'],
            'gambar' => $filename
        ];

        session(['buku' => $buku]);

        return redirect('/pengelolaan');
    }

    public function profile(Request $request) {

        $username = $request->query('username');

        $profile = session('profile', [
            'nama' => $username,
            'email' => $username . '@example.com'

        ]);
        return view('buku.profile', compact('username', 'profile'));
    }

    public function updateProfile(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email'
    ]);
        session(['profile' => $validated]);

        return redirect('/profile?username=' . $validated['nama']);
    }
}
