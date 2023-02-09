<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangPermintaan extends Model
{
    protected $table            = 'barang_permintaan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_barang', 'jumlah_permintaan', 'satuan', 'keterangan','jumlah_disetujui','tanggal_disetujui','status','id_permintaan','nip',
    ];
}
