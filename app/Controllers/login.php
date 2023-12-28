<?php

namespace App\Controllers;

use App\Models\m_user;

class login extends BaseController
{
    protected $m_user;

    public function __construct()
    {
        $this->m_user = new m_user();
    }

    public function index()
    {
        return view('login/login');
    }

    public function log()
    {
        $idpengguna = $this->request->getPost('211127_idpengguna');
        $username = $this->request->getPost('211127_namapengguna');
        $password = $this->request->getPost('211127_katasandi');
        $nama = $this->request->getPost('211127_nama');

        $cek_admin = $this->m_user->auth_user($username, $password, $nama,$idpengguna);

        if ($cek_admin) {
            session()->set([
                'log' => true,
                'username' => $cek_admin['211127_namapengguna'],
                'email' => $cek_admin['211127_email'],
                'password' => $cek_admin['211127_katasandi'],
                'nama' => $cek_admin['211127_nama'],
                'idpengguna' => $cek_admin['211127_idpengguna'],
                'email' => $cek_admin['211127_email']
            ]);
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('gagal', 'Login Gagal');
            session()->setFlashdata('salah', 'Username atau Password salah ');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('nama');
        session()->remove('idpengguna');
        return redirect()->to('/login');
    }
}
