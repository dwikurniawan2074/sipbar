<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterOperator implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->id_role == ''){
            return redirect()->to('/login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->id_role == 4){
            return redirect()->to('/operator/halaman_operator');
        }
    }
}