<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KabagController extends BaseController
{
    public function halaman_kabag()
    {
        return view('kabag/halaman_kabag');
    }
    public function halaman_permintaan()
    {
        return view('kabag/halaman_permintaan');
    }
    public function halaman_stok_barang()
    {
        return view('kabag/halaman_stok_barang');
    }
}
