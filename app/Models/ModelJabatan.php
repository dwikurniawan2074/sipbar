<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_jabatan'
    ];
}
