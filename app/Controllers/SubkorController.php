<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SubkorController extends BaseController
{
    public function halaman_subkor()
    {
        return view('subkor/halaman_subkor');
    }
}
