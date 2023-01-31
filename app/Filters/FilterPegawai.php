<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterPegawai implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->idlevel == ''){
            return redirect()->to('/login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->idlevel == 1){
            return redirect()->to('/pegawai/halaman_pegawai');
        }
    }
}