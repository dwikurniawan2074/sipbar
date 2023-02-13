<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'nip';
    protected $allowedFields    = [
        'nip','nama_pegawai', 'id_pangkat', 'id_jabatan', 'id_bidang', 'id_role'
    ];

    // public function getPegawai()
    // {
    //     return $this->db->table('pegawai')->get()->getResultArray();
    // }
}
