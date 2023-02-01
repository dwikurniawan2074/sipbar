<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nip', 'nama', 'pangkat', 'jabatan', 'role', 'id_bidang'
    ];

    // public function getPegawai()
    // {
    //     return $this->db->table('pegawai')->get()->getResultArray();
    // }
}
