<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKabag implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->id_role == ''){
            return redirect()->to('/login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->id_role == 3){
            return redirect()->to('/kabag/halaman_kabag');
        }
    }
}