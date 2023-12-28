<?php

namespace App\Controllers;

use App\Models\m_tugas;
use App\Models\m_kategori;
use App\Models\m_pengguna;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Controllers\BaseController;

class Tugas extends BaseController
{
    protected $m_tugas;
    protected $m_kategori;
    protected $m_pengguna;

    public function __construct()
    {
        $this->m_tugas = new m_tugas();
        $this->m_kategori = new m_kategori();
        $this->m_pengguna = new m_pengguna();
    }

    public function index()
    {
        $idpengguna = session()->get('idpengguna');

        // Mendapatkan tugas yang belum diarsipkan
        $data['tugas'] = $this->m_tugas->getTugas($idpengguna);

        // Mendapatkan tugas yang sudah diarsipkan
        $data['archivedTugas'] = $this->m_tugas->getArchivedTugas($idpengguna);

        // Filter tugas yang belum diarsipkan
        $data['tugas'] = array_filter($data['tugas'], function ($tugas) {
            return !$tugas['211127_archived']; // Jika 'archived' == false, berarti belum diarsipkan
        });

        $data = [
            'title' => 'Data Tugas',
            'tugas' => $data['tugas'],
            'archivedTugas' => $data['archivedTugas'],
            'activePage' => 'tugas',
        ];

        return view('tugas/index', $data);
    }


    public function create()
    {
        $data['kategori'] = $this->m_kategori->findAll();
        // $data['pengguna'] = $this->m_pengguna->findAll();
        $data = [
            'title' => 'Data Tugas',
            'pengguna' =>  $this->m_pengguna->getPengguna(),
            'kategori' =>  $this->m_kategori->getKategori(),
            'activePage' => 'tugas',
        ];
        return view('tugas/create', $data);
    }
    public function save()
    {
        $namatugas = $this->request->getPost('namatugas');
        $deskripsi = $this->request->getPost('deskripsi');
        $idpengguna = $this->request->getPost('idpengguna');
        $label = $this->request->getPost('label');
        $waktuterakhir = $this->request->getPost('waktuterakhir');
        $idkategori = $this->request->getPost('idkategori');
        $email_tujuan = $this->request->getPost('email_tujuan');

        // Insert data into the database
        $this->m_tugas->insertData($namatugas, $deskripsi, $idpengguna, $label, $waktuterakhir, $idkategori, $email_tujuan);

        // Send email
        $email = service('email');
        $email->setTo($email_tujuan);
        $email->setFrom('admin@simpel.com', 'Administrator');
        $email->setSubject($label);
        $email->setMessage("
        $namatugas <br>
        Waktu Terakhir Pengumpulan tugas : $waktuterakhir<br> 
        Segera Lengkap Tugas Anda <br>
        $deskripsi
        ");

        try {
            if ($email->send()) {
                session()->setFlashdata('pesan', 'Tugas berhasil ditambahkan dan email terkirim.');
            } else {
                session()->setFlashdata('pesan', 'Tugas berhasil ditambahkan, tetapi terjadi kesalahan saat mengirim email. Silahkan Periksa Koneksi Internet Anda.');
                log_message('error', 'Gagal mengirim email: ' . $email->printDebugger(['headers']));
            }
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'Tugas berhasil ditambahkan, tetapi terjadi kesalahan saat mengirim email. Silahkan Periksa Koneksi Internet Anda.');
            log_message('error', 'Exception: ' . $e->getMessage());
        }

        return redirect()->to('/tugas');
    }
    public function edit($idtugas)
    {
        $data = [
            'title' => 'Edit Tugas',
            'activePage' => 'tugas',
        ];
        $data['kategori'] = $this->m_kategori->findAll();
        $data['pengguna'] = $this->m_pengguna->findAll();
        $data['tugas'] = $this->m_tugas->find($idtugas);

        return view('tugas/edit', $data);
    }

    public function update()
    {
        $idtugas = $this->request->getPost('idtugas');

        $data = [
            '211127_namatugas' => $this->request->getPost('namatugas'),
            '211127_deskripsi' => $this->request->getPost('deskripsi'),
            '211127_tanggalterakhir' => $this->request->getPost('tanggalterakhir'),
            '211127_idpengguna' => $this->request->getPost('idpengguna'),
            '211127_label' => $this->request->getPost('label'),
            '211127_waktuterakhir' => $this->request->getPost('waktuterakhir'),
            '211127_idkategori' => $this->request->getPost('idkategori')
        ];

        $this->m_tugas->updateTugas($idtugas, $data);

        session()->setFlashdata('pesan', 'Tugas berhasil diupdate.');
        return redirect()->to('/tugas');
    }

    public function delete($idtugas)
    {
        $this->m_tugas->deleteTugas($idtugas);

        session()->setFlashdata('hapus', 'Tugas berhasil dihapus.');
        return redirect()->to('/tugas');
    }

    public function archive($idtugas)
    {
        $this->m_tugas->archiveTugas($idtugas);

        session()->setFlashdata('pesan', 'Tugas berhasil diarsipkan.');
        return redirect()->to('/tugas');
    }
    public function unarchive($idtugas)
    {
        $this->m_tugas->unarchiveTugas($idtugas);

        session()->setFlashdata('pesan', 'Tugas berhasil di-unarchive.');
        return redirect()->to('/tugas');
    }
    public function archived()
    {
        $idpengguna = session()->get('idpengguna');

        // Mendapatkan tugas yang belum diarsipkan
        // Ambil data tanggal mulai dan akhir dari formulir
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $data['archivedTugas'] = $this->m_tugas->getTugas($idpengguna, $start_date, $end_date);

        $data = [
            'title' => 'Data Tugas',
            'archivedTugas' => $data['archivedTugas'],
            'activePage' => 'tugas',
        ];

        return view('tugas/archived', $data);
    }
    public function exportPdf()
    {
        $idpengguna = session()->get('idpengguna');
        // Ambil data tanggal mulai dan akhir dari formulir
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');

        // Panggil fungsi getTugasByDateRange dengan tanggal yang diberikan
        $archivedTugas = $this->m_tugas->getTugas($idpengguna, $start_date, $end_date);

        // Panggil fungsi untuk generate PDF dengan menambahkan judul
        $this->generatePdf($archivedTugas, 'Data Tugas PDF');
    }

    protected function generatePdf($data, $title)
    {
        // Load view content into a variable
        $html = view('tugas/pdf_template', ['archivedTugas' => $data, 'Tugas' => $title]);

        // Create PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        // Display PDF in the browser
        $dompdf->stream("output.pdf", array("Attachment" => false));
    }
}
