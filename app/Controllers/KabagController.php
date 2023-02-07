<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;
use App\Models\ModelBarang;

class KabagController extends BaseController
{
    public function halaman_kabag()
    {
        return view('kabag/halaman_kabag');
    }
    public function halaman_permintaan()
    {
        $permintaanNew = new Permintaan();
        $permintaan = $permintaanNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan
        ];
        return view('pegawai/halaman_permintaan', $data);
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
}
