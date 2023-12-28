<?php

namespace App\Controllers;
use App\Models\m_user;
class registrasi extends BaseController
{
    protected $m_user;
    public function __construct()
	{
		$this->m_user = new m_user();
	}
    public function index()
    {
        // $data = [
        //     'validation' => \Config\Services::validation()
        // ];
        return view('user/registrasi');
    }
    public function save()
	{
		// $m_user = new m_user();
		// $rules = [
		// 	'211127_namapengguna' => [
		// 		'rules' => 'required|is_unique[tbl_pengguna_211127.211127_namapengguna]|min_length[10]',
		// 		'errors' => [
		// 			'required' => 'Username Harus Diisi.',
		// 			'is_unique' => 'Username Sudah Terdaftar.',
        //             'min_length' => 'Username minimal 10 Angka',
		// 		]
		// 	]
		// ];
        // dd($rules);
		// if(!$this->validate($rules)){
		// 	// session()->setFlashdata('errors',$this->validator->listErrors());
		// 	return redirect()->back()->withInput()->with('errors',$this->validator->listErrors());
		// }
		$this->m_user->save([
            '211127_nama' => $this->request->getVar('211127_nama'),
			'211127_namapengguna' => $this->request->getVar('211127_namapengguna'),
            '211127_katasandi' => $this->request->getVar('211127_katasandi'),
			'211127_email' => $this->request->getVar('211127_email'),
		]);

		session()->setFlashdata('pesan','Data Berhasil Ditambahkan.');

		return redirect()->to('/login');
	}
}
