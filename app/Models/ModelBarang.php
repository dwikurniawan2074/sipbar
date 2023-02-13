<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table            = 'data_barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'kode_barang','nama_barang','satuan', 'stok_awal','stok_menjadi','status_barang','tanggal'
    ];
}
