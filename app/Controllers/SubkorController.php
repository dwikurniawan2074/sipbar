<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SubkorController extends BaseController
{
    public function halaman_subkor()
    {
        return view('subkor/halaman_subkor');
    }
    public function halaman_permintaan()
    {
        return view('subkor/halaman_permintaan');
    }
    public function halaman_stok_barang()
    {
        return view('subkor/halaman_stok_barang');
    }
}
