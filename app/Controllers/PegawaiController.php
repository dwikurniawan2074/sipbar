<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    public function halaman_pegawai()
    {
        return view('pegawai/halaman_pegawai');
    }
    public function halaman_input_permintaan()
    {
        return view('pegawai/halaman_input_permintaan');
    }
    public function halaman_permintaan()
    {
        return view('pegawai/halaman_permintaan');
    }
    public function halaman_stok_barang()
    {
        return view('pegawai/halaman_stok_barang');
    }
}
