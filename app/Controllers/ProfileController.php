<?php

namespace App\Controllers;

use App\Models\m_user;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'title' =>'Ubah Profile'
        ];
        return view('user/edit_profile',$data);
    }

    public function editProfileSubmit()
    {
        // Mendapatkan idpengguna dari sesi atau parameter sesuai kebutuhan
        $idpengguna = session()->get('idpengguna');

        // Menyiapkan data yang ingin diubah
        $data = [
            '211127_namapengguna' => $this->request->getPost('namapengguna'),
            '211127_katasandi' => $this->request->getPost('password'),
            '211127_nama' => $this->request->getPost('nama'),
            // Tambahkan field lainnya yang ingin diubah
        ];

        // Memanggil model m_user
        $model = new m_user();

        // Memanggil fungsi edit_profile
        $result = $model->edit_profile($idpengguna, $data);

        // Mengembalikan hasil (bisa ditangani sesuai kebutuhan)
        if ($result) {
            // Berhasil diubah
            return redirect()->to('/ProfileController')->with('success', 'Profil berhasil diubah');
        } else {
            // Gagal diubah
            return redirect()->to('/ProfileController')->with('error', 'Gagal mengubah profil');
        }
    }
}

