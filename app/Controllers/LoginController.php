<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

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

        if (!$valid) {
            $sessError = [
                'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('pass')
            ];
            session()->setFlashdata($sessError);
            return redirect()->to('/');
        } else {
            $modelLogin = new ModelLogin();

            $cekUserLogin = $modelLogin->find($idUser);
            if ($cekUserLogin == null) {
                $sessError = [
                    'errIdUser' => 'Maaf User Tidak Terdaftar',
                ];
                session()->setFlashdata($sessError);
                return redirect()->to('/');
            } else {
                $passwordUser = $cekUserLogin['user_password'];

                if (password_verify($pass, $passwordUser)) {
                    $idlevel = $cekUserLogin['user_level_id'];

                    $simpan_session = [
                        'iduser' => $idUser,
                        'namauser' => $cekUserLogin['user_nama'],
                        'idlevel' => $idlevel
                    ];

                    session()->set($simpan_session);

                    return redirect()->to(site_url('/template/dashboard'));
                } else {
                    $sessError = [
                        'errPassword' => 'Password Yang Anda Masukkan Salah',
                    ];
                    session()->setFlashdata($sessError);
                    return redirect()->to('/');
                    
                }
            }
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
