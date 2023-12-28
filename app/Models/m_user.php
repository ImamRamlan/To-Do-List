<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
    protected $table            = 'tbl_pengguna_211127';
    protected $primaryKey       = '211127_idpengguna';
    protected $allowedFields    = ['211127_namapengguna', '211127_katasandi', '211127_nama','211127_email'];

    public function auth_user($username, $password)
    {
        return $this->db->table('tbl_pengguna_211127')
            ->where([
                '211127_namapengguna' => $username,
                '211127_katasandi' => $password,
            ])
            ->get()
            ->getRowArray();
    }

    public function edit_profile($idpengguna, $data)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $idpengguna)
            ->update($data);
    }
}
