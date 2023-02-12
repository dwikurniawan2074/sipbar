<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\Permintaan;
use App\Models\ModelPegawai;



class SubkorController extends BaseController
{
    public function halaman_subkor()
    {
        return view('subkor/halaman_subkor');
    }
    public function halaman_permintaan()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $pgw = new ModelPegawai();
        $permintaan= $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                    ->join('bidang','pegawai.id_bidang=bidang.id')
                    ->get();
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];
        return view('subkor/halaman_permintaan',$data);
    }
    public function halaman_stok_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('subkor/halaman_stok_barang',$data);
    }
}
