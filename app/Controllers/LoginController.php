<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use App\Models\ModelPegawai;
use App\Models\ModelRole;
use App\Models\ModelBidang;
use App\Models\ModelPangkat;

class LoginController extends BaseController
{
    public function index()
    {
        $pegawaiModel = new ModelPegawai();
        $bidangModel = new ModelBidang();
        $pangkatModel = new ModelPangkat();
        $roleModel = new ModelRole();

        $pegawai = $pegawaiModel->findAll();
        $bidang = $bidangModel->findAll();
        $pangkat = $pangkatModel->findAll();
        $role = $roleModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'bidang' => $bidang,
            'pangkat' => $pangkat,
            'role' => $role
        ];

        return view('login', $data);
    }

    public function cekUser()
    {
        $namaRole = $this->request->getPost('nama_role');
        // $idUser = $this->request->getPost('iduser');
        $pass = $this->request->getPost('pass');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'nama_role' => [
                'label' => 'User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            // 'iduser' => [
            //     'label' => 'ID User',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} tidak boleh kosong'
            //     ]
            // ],
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

                'errNamaRole' => $validation->getError('nama_role'),
                // 'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('pass')
            ];
            session()->setFlashdata($sessError);
            return redirect()->to('/');
        } else {
            //pengecekan bagian bagian input jenis role nya bener tidak

            $pegawaiModel = new ModelPegawai();
            $roleModel = new ModelRole();
            // $modelLogin = new ModelLogin();

            

            $cekUserLogin = $pegawaiModel->find($pass);

            $idRole = $cekUserLogin['id_role'];
            // dd($idRole);
            
            $cekRoleLogin = $roleModel->find($idRole);
            // dd($cekRoleLogin);
            // $cekUserLogin = $modelLogin->find($idUser);
            if ($cekUserLogin == null) {
                $sessError = [
                    'errNamaRole' => 'Maaf User Tidak Terdaftar',
                ];
                session()->setFlashdata($sessError);
                return redirect()->to('/');
            } else {
                //variable penampung password
                $passwordUser = $cekUserLogin['nip'];
                $roleUser = $cekRoleLogin['nama_role'];

                
                // $passwordUser = $cekUserLogin['user_password'];

                //proses pengecekan password
                //ubah jadi => password_verify($pass, $passwordUser)
                //atau if ($pass == $passwordUser)
                if ($pass == $passwordUser && $namaRole == $roleUser) {
                    // dd($pass);
                    // $idRole = $cekUserLogin['id_role'];


                    // $idlevel = $cekUserLogin['user_level_id'];

                    $simpan_session = [
                        'nama_role' => $namaRole,
                        'nip' => $cekUserLogin['nip'],
                        'nama_pegawai' => $cekUserLogin['nama_pegawai'],
                        'id_role' => $idRole,


                        // 'iduser' => $idUser,
                        // 'namauser' => $cekUserLogin['user_nama'],
                        // 'idlevel' => $idlevel
                    ];
                    // dd($simpan_session);

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
