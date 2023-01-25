<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OperatorController extends BaseController
{
    public function halaman_operator()
    {
        return view('operator/halaman_operator');
    }

    public function halaman_permintaan()
    {
        return view('operator/halaman_permintaan');
    }
    public function halaman_input_barang()
    {
        return view('operator/halaman_input_barang');
    }
    public function halaman_laporan_stok()
    {
        return view('operator/halaman_laporan_stok');
    }
}
