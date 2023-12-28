<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pengguna extends Model
{
    protected $table = 'tbl_pengguna_211127';
    protected $primaryKey = '211127_idpengguna';
    protected $allowedFields = ['211127_namapengguna', '211127_email'];

    public function getPengguna()
    {
        return $this->findAll();
    }

    public function insertPengguna($data)
    {
        return $this->insert($data);
    }

    public function updatePengguna($idpengguna, $data)
    {
        return $this->update($idpengguna, $data);
    }

    public function deletePengguna($idpengguna)
    {
        return $this->delete($idpengguna);
    }
}
