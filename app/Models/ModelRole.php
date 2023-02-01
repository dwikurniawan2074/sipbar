<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRole extends Model
{
    protected $table            = 'role';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_role'
    ];
}
