<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangMasuk extends Model
{
    protected $table            = 'data_barang_masuk';
    protected $primaryKey       = 'id_barang_masuk';
    protected $allowedFields    = [
        'id_barang','jumlah_barangMasuk','tanggal_barangMasuk'
    ];
}
