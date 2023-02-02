<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanSementara extends Model
{
    protected $table            = 'permintaansementara_barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nip','nama_barang', 'jumlah', 'satuan', 'keterangan','tanggal_permintaan'
    ];
}
