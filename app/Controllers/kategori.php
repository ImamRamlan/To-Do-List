<?php

namespace App\Controllers;

use App\Models\m_kategori;

class kategori extends BaseController
{
	protected $m_kategori;
	public function __construct()
	{
		$this->m_kategori = new m_kategori();
	}
    public function index()
    {
        if(session()->get('log') != TRUE){
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'title' => 'Tambah Kategori',
            'kategori' => $this->m_kategori->getKategori(),
			'pager' => $this->m_kategori->pager,
            'activePage' => 'kategori',
        ];
        return view('kategori/index',$data);
    }   
    public function save()
    {
        $namaKategori = $this->request->getPost('namakategori');
        $kodeWarna = $this->request->getPost('kodewarna');

        $this->m_kategori->insertData($namaKategori, $kodeWarna);

        session()->setFlashdata('pesan', 'Kategori berhasil ditambahkan.');
        return redirect()->to('/kategori');
        
    }
    public function delete($idkategori)
	{
		$this->m_kategori->delete($idkategori);
		session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

		return redirect()->to('/kategori');
	}
}
