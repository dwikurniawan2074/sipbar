<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan extends Model
{
    protected $table            = 'permintaan_barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nip','nama_barang', 'jumlah', 'satuan', 'keterangan','tanggal_permintaan','tanggal_disetujui','status'
    ];
}
