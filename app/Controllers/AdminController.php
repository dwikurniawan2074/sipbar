<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPegawai;

class AdminController extends BaseController
{

    public function halaman_admin()
    {
        return view('admin/halaman_admin');
    }

    public function data_akun()
    {
        $pegawaiModel = new ModelPegawai();
        $pegawai = $pegawaiModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai
        ];

        return view('admin/data_akun', $data);
    }

    public function input_data()
    {
        return view('admin/input_data');
    }

    public function tambah_akun()
    {
        $pegawaiModel = new ModelPegawai();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'pangkat' => $this->request->getPost('pangkat'),
            'bidang' => $this->request->getPost('bidang'),
            'jabatan' => $this->request->getPost('jabatan'),
            'role' => $this->request->getPost('role')
        ];

        $pegawaiModel->insert($data);
        return view('admin/data_akun');
    }
}
