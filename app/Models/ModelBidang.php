<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBidang extends Model
{
    protected $table            = 'bidang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id', 'nama_bidang'
    ];
}
