<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPangkat extends Model
{
    protected $table            = 'pangkat';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_pangkat'
    ];

    // public function getPegawai()
    // {
    //     return $this->db->table('pegawai')->get()->getResultArray();
    // }
}
