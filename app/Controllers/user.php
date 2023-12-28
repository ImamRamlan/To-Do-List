<?php

namespace App\Controllers;

use App\Models\m_tugas;

class User extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!session('log')) {
            return redirect()->to('/login');
        }

        // Inisialisasi model tugas
        $modelTugas = new m_tugas();

        // Mendapatkan jumlah tugas dan warna unik
        $jumlahTugas = $modelTugas->countTugas();
        $distinctColors = $modelTugas->getDistinctColors();

        // Data yang akan dikirimkan ke tampilan
        $data = [
            'title' => 'Beranda Utama',
            'jumlahTugas' => $jumlahTugas,
            'distinctColors' => $distinctColors,
            'modelTugas' => $modelTugas,
            'activePage' => 'user', // Tambahkan halaman aktif di sini
        ];

        // Tampilkan tampilan dengan data yang sudah diatur
        return view('user/index', $data);
    }
}
