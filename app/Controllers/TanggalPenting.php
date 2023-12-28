<?php

namespace App\Controllers;

use App\Models\m_tanggalpenting;
use App\Models\m_pengguna;

class TanggalPenting extends BaseController
{
    protected $m_tanggalpenting;
    protected $m_pengguna;

    public function __construct()
    {
        $this->m_tanggalpenting = new m_tanggalpenting();
        $this->m_pengguna = new m_pengguna();
    }
    public function index()
    {
        $m_pengguna = new m_pengguna();
        $data = [
            'title' => 'Tanggal Penting',
            'activePage' => 'TanggalPenting',
        ];

        $bulan = $this->request->getGet('bulan') ?? date('m');
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['penggunaList'] = $m_pengguna->findAll();

        // Panggil metode baru untuk mengambil data tanggal penting berdasarkan bulan dan tahun
        $data['tanggalpenting'] = $this->m_tanggalpenting->getTglPentingByBulanTahun($bulan, $tahun);

        // Hitung jumlah hari dalam bulan
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $data['daysInMonth'] = $daysInMonth;

        // Tampilkan view dengan $data
        return view('tanggalpenting/index', $data);
    }
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Tanggal Penting'
    //     ];
    
    //     $bulan = $this->request->getGet('bulan') ?? date('m');
    //     $tahun = $this->request->getGet('tahun') ?? date('Y');
    //     $waktu = $this->request->getGet('waktu') ?? date('G'); // Tambahkan baris ini
    
    //     $data['bulan'] = $bulan;
    //     $data['tahun'] = $tahun;
    //     $data['waktu'] = $waktu; // Tambahkan baris ini
    
    //     // Panggil metode baru untuk mengambil data tanggal penting berdasarkan bulan, tahun, dan waktu
    //     $data['tanggalpenting'] = $this->m_tanggalpenting->getTglPentingByBulanTahunWaktu($bulan, $tahun, $waktu);
    
    //     // Hitung jumlah hari dalam bulan
    //     $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
    //     $data['daysInMonth'] = $daysInMonth;
    
    //     // Tampilkan view
    //     return view('tanggalpenting/index', $data);
    // }
    public function add()
    {
        $model = new m_tanggalpenting();
        $penggunaModel = new m_pengguna();

        if ($this->request->getMethod() === 'post') {
            $tanggal = $this->request->getPost('tanggal');
            $namatanggal = $this->request->getPost('namatanggal');
            $notetanggal = $this->request->getPost('notetanggal');
            $idpengguna = $this->request->getPost('idpengguna');

            $model->insertTanggalPenting([
                '211127_tanggal' => $tanggal,
                '211127_namatanggal' => $namatanggal,
                '211127_idpengguna' => $idpengguna,
                '211127_notetanggal' => $notetanggal,
            ]);
            session()->setFlashdata('message', 'Data tanggal penting berhasil ditambahkan.');
            return redirect()->to('/tanggalpenting');
        }

        // Ambil daftar pengguna untuk ditampilkan di dropdown
        $data['penggunaList'] = $penggunaModel->findAll();

        // Tampilkan view
        return view('tanggalpenting/add', $data);
    }

    private function generateCalendarData($tanggalpenting)
    {
        $calendarData = [];

        foreach ($tanggalpenting as $row) {
            $tanggalPenting = date('Y-m-d', strtotime($row['211127_tanggal']));
            $namaTanggal = $row['211127_namatanggal'];
            $noteTanggal = $row['211127_notetanggal'];

            $dayNumber = date('j', strtotime($tanggalPenting));
            $dayName = date('D', strtotime($tanggalPenting));

            $calendarData[$dayNumber][$dayName][] = [
                'namaTanggal' => $namaTanggal,
                'noteTanggal' => $noteTanggal,
            ];
        }

        return $calendarData;
    }
}
