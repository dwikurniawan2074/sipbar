<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangPermintaan extends Model
{
    protected $table            = 'barang_permintaan';
    protected $primaryKey       = 'id_barang_permintaan';
    protected $allowedFields    = [
        'id_barang', 'jumlah_permintaan', 'keterangan', 'jumlah_disetujui', 'tanggal_disetujui', 'status', 'id_permintaan', 'nip',
    ];

    // public function getPermintaan()
    // {
    //     return $this->db->table('barang_permintaan')
    //         ->join('permintaan_barang', 'barang_permintaan.id_permintaan=permintaan_barang.id')
    //         ->join('data_barang', 'barang_permintaan.id_barang=data_barang.id')
    //         ->join('pegawai', 'barang_permintaan.nip=pegawai.nip')
    //         ->join('bidang', 'pegawai.id_bidang=bidang.id')
    //         ->get()->getResultArray();
    // }


    // public function laporanPerPeriode($tglawal, $tglakhir)
    // {
    //     $permintaanNew = new ModelBarangPermintaan();
    //     $data = $permintaanNew->getPermintaan();

    //     $query = $this->table('barang_permintaan')->where('tanggal_permintaan >=', $tglawal)->where('tanggal_permintaan <=', $tglakhir)->get();

    //     dd($query);
    //     return null;
        
    // }
}
