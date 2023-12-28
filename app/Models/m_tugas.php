<?php

namespace App\Models;

use CodeIgniter\Model;

class m_tugas extends Model
{
    protected $table = 'tbl_tugas_211127';
    protected $primaryKey = '211127_idtugas';
    protected $allowedFields = [
        '211127_namatugas',
        '211127_deskripsi',
        '211127_idpengguna',
        '211127_label',
        '211127_waktuterakhir',
        '211127_idkategori',
        '211127_email',
        '211127_archived',
    ];
    public function getTugas($idpengguna = null, $tanggalAwal = null, $tanggalAkhir = null)
    {
        $this->select('tbl_tugas_211127.*, tbl_kategori_211127.211127_namakategori, tbl_kategori_211127.211127_kodewarna, tbl_pengguna_211127.211127_namapengguna')
            ->join('tbl_kategori_211127', 'tbl_tugas_211127.211127_idkategori = tbl_kategori_211127.211127_idkategori')
            ->join('tbl_pengguna_211127', 'tbl_tugas_211127.211127_idpengguna = tbl_pengguna_211127.211127_idpengguna');

        if ($idpengguna !== null) {
            $this->where('tbl_tugas_211127.211127_idpengguna', $idpengguna);
        }

        if ($tanggalAwal !== null && $tanggalAkhir !== null) {
            // Tambahkan filter berdasarkan tanggal awal dan akhir
            $this->where("tbl_tugas_211127.211127_waktuterakhir BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        }

        $this->orderBy('211127_idtugas', 'DESC');

        return $this->findAll();
    }
    public function getArchivedTugas($idpengguna = null)
    {
        $this->select('tbl_tugas_211127.*, tbl_kategori_211127.211127_namakategori, tbl_kategori_211127.211127_kodewarna, tbl_pengguna_211127.211127_namapengguna')
            ->join('tbl_kategori_211127', 'tbl_tugas_211127.211127_idkategori = tbl_kategori_211127.211127_idkategori')
            ->join('tbl_pengguna_211127', 'tbl_tugas_211127.211127_idpengguna = tbl_pengguna_211127.211127_idpengguna')
            ->where('tbl_tugas_211127.211127_archived', 1);

        if ($idpengguna !== null) {
            $this->where('tbl_tugas_211127.211127_idpengguna', $idpengguna);
        }

        $this->orderBy('211127_idtugas', 'DESC');

        return $this->findAll();
    }

    public function insertData($namatugas, $deskripsi, $idpengguna, $label, $waktuterakhir, $idkategori, $email_tujuan)
    {
        $data = [
            '211127_namatugas' => $namatugas,
            '211127_deskripsi' => $deskripsi,
            '211127_idpengguna' => $idpengguna,
            '211127_label' => $label,
            '211127_waktuterakhir' => $waktuterakhir,
            '211127_idkategori' => $idkategori,
            '211127_email' => $email_tujuan,
        ];

        $this->db->table('tbl_tugas_211127')->insert($data);
    }

    public function updateTugas($idtugas, $data)
    {
        return $this->update($idtugas, $data);
    }

    public function deleteTugas($idtugas)
    {
        return $this->delete($idtugas);
    }

    public function countTugas()
    {
        return $this->countAll();
    }

    public function countUnreadTasks()
    {
        return $this->where('211127_label', 'belum_dibaca')->countAllResults();
    }

    public function getDistinctColors()
    {
        return $this->distinct('211127_kodewarna')->findAll();
    }

    public function countTugasByKodewarna($kodewarna)
    {
        return $this->selectCount('tbl_tugas_211127.211127_idkategori', 'jumlah_tugas_by_kodewarna')
            ->join('tbl_kategori_211127', 'tbl_tugas_211127.211127_idkategori = tbl_kategori_211127.211127_idkategori')
            ->where('tbl_kategori_211127.211127_kodewarna', $kodewarna)
            ->first()['jumlah_tugas_by_kodewarna'] ?? 0;
    }

    public function archiveTugas($idtugas)
    {
        $data = ['211127_archived' => 1];
        return $this->update($idtugas, $data);
    }
    public function unarchiveTugas($idtugas)
    {
        $data = ['211127_archived' => 0]; // Ubah status archived menjadi tidak diarsipkan
        return $this->update($idtugas, $data);
    }
    public function getTugass($idpengguna = null, $includeArchived = true)
    {
        $this->select('tbl_tugas_211127.*, tbl_kategori_211127.211127_namakategori, tbl_kategori_211127.211127_kodewarna, tbl_pengguna_211127.211127_namapengguna')
            ->join('tbl_kategori_211127', 'tbl_tugas_211127.211127_idkategori = tbl_kategori_211127.211127_idkategori')
            ->join('tbl_pengguna_211127', 'tbl_tugas_211127.211127_idpengguna = tbl_pengguna_211127.211127_idpengguna');

        if ($idpengguna !== null) {
            $this->where('tbl_tugas_211127.211127_idpengguna', $idpengguna);
        }

        // Tambahkan kondisi jika tidak ingin menyertakan yang diarsipkan
        if (!$includeArchived) {
            $this->where('tbl_tugas_211127.211127_archived', 0);
        }

        $this->orderBy('211127_idtugas', 'DESC');

        return $this->findAll();
    }
}
