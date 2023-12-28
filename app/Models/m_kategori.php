<?php

namespace App\Models;

use CodeIgniter\Model;

class m_kategori extends Model
{
    protected $table = 'tbl_kategori_211127';
    protected $primaryKey = '211127_idkategori';
    protected $allowedFields = ['211127_namakategori', '211127_kodewarna'];

    public function getKategori()
    {
        return $this->findAll();
    }

    public function insertData($namakategori, $kodewarna)
    {
        $data = [
            '211127_namakategori' => $namakategori,
            '211127_kodewarna' => $kodewarna,
        ];

        $this->db->table('tbl_kategori_211127')->insert($data);
    }
}
