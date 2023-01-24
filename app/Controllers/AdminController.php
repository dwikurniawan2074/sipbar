<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function halaman_admin()
    {
        return view('admin/halaman_admin');
    }

    public function data_akun()
    {
        return view('admin/data_akun');
    }

    public function input_data()
    {
        return view('admin/input_data');
    }
}
