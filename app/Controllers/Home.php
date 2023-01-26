<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function halaman_dashboard()
    {
        return view('template/dashboard_sementara');
    }
    
}
