<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = [
        'user_id', 'user_nama', 'user_password', 'user_level_id'
    ];
}
