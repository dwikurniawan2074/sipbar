<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function cekUser()
    {
        $idUser = $this->request->getPost('iduser');
        $pass = $this->request->getPost('pass');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'iduser' => [
                'label' => 'ID User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if(!$valid){
            $sessError = [
                'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('pass')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to('/');
        }
    }
}
