<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\ModelPegawai;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBidang;
use DateTime;
class KabagController extends BaseController
{
    public function halaman_kabag()
    {
        return view('kabag/halaman_kabag');
    }
    public function halaman_permintaan()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $permintaan= $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                    ->join('bidang','pegawai.id_bidang=bidang.id')
                    ->where('barang_permintaan.status','1')
                    ->get();
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];

        return view('kabag/halaman_permintaan', $data);
    }
    public function halaman_stok_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('kabag/halaman_stok_barang',$data);
    }

    public function halaman_stok_barangMasuk()
    {
        $data_barang = new ModelBarangMasuk();
        $barang = $data_barang->select('*')
                -> join('data_barang','data_barang_masuk.id_barang=data_barang.id')
                -> get();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];
        return view('kabag/halaman_data_barang_masuk', $data);

    }
    public function halaman_data_barang_keluar()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $permintaan     = $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                    ->join('bidang','pegawai.id_bidang=bidang.id')
                    ->where('barang_permintaan.status','2')
                    ->get();

        $data = [
            'title' => 'Data Barang',
            'permintaan' => $permintaan
        ];
        return view('kabag/halaman_data_barang_keluar', $data);
    }
}