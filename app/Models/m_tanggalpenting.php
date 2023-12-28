<?php

namespace App\Models;

use CodeIgniter\Model;

class m_tanggalpenting extends Model
{
    protected $table = 'tbl_tanggalpenting_211127';
    protected $primaryKey = '211127_idtanggal';
    protected $allowedFields = [
        '211127_namatanggal',
        '211127_tanggal',
        '211127_idpengguna',
        '211127_notetanggal'
    ];

    public function getTanggalPenting()
    {
        return $this->findAll();
    }
    public function getTglPentingByBulanTahun($bulan, $tahun)
    {
        return $this->select('*')
            ->where("MONTH(211127_tanggal)", $bulan)
            ->where("YEAR(211127_tanggal)", $tahun)
            ->join('tbl_pengguna_211127', 'tbl_tanggalpenting_211127.211127_idpengguna = tbl_pengguna_211127.211127_idpengguna')
            ->orderBy('211127_tanggal', 'ASC')
            ->findAll();
    }

    public function getTanggalByMonth($month)
    {
        return $this->where("MONTH(211127_tanggal)", $month)->findAll();
    }
    public function getPengguna($idPengguna)
    {
        $builder = $this->db->table('tbl_pengguna_211127');
        $builder->where('211127_idpengguna', $idPengguna);
        return $builder->get()->getRow();
    }

    public function insertTanggalPenting($data)
    {
        return $this->insert($data);
    }

    public function updateTanggalPenting($idtanggal, $data)
    {
        return $this->update($idtanggal, $data);
    }

    public function deleteTanggalPenting($idtanggal)
    {
        return $this->delete($idtanggal);
    }
    public function getTglPentingByBulanTahunHariWaktu($bulan, $tahun, $hari, $waktu)
    {
        // Implement your query logic here
        // Example:
        return $this->where('month(211127_tanggal)', $bulan)
            ->where('year(211127_tanggal)', $tahun)
            ->where('dayofweek(211127_tanggal)', $hari)
            ->where('hour(211127_tanggal)', $waktu)
            ->findAll();
    }
    public function getTglPentingByBulanTahunWaktu($bulan, $tahun, $waktu)
    {
        // Sesuaikan dengan struktur dan format waktu pada tabel database
        $formattedWaktu = sprintf('%02d:00:00', $waktu);

        return $this->db->table('tbl_tanggalpenting_211127')
            ->where('MONTH(211127_tanggal)', $bulan)
            ->where('YEAR(211127_tanggal)', $tahun)
            ->where('TIME(211127_tanggal)', $formattedWaktu)
            ->get()->getResultArray();
    }
}
