<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangPermintaan extends Model
{
    protected $table            = 'barang_permintaan';
    protected $primaryKey       = 'id_barang_permintaan';
    protected $allowedFields    = [
         'id_barang','jumlah_permintaan', 'keterangan','jumlah_disetujui','tanggal_disetujui','status','id_permintaan','nip',
    ];
}
