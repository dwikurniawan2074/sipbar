<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBidang;
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
        $pegawai = $pegawaiModel
            ->join('bidang', 'bidang.id=pegawai.id_bidang', 'left')
            ->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai
        ];

        return view('admin/data_akun', $data);
    }

    public function input_data()
    {
        $pegawaiModel = new ModelPegawai();
        $bidangModel = new ModelBidang();

        $pegawai = $pegawaiModel->findAll();
        $bidang = $bidangModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'bidang' => $bidang
        ];

        return view('admin/input_data', $data);
    }

    public function tambah_akun()
    {
        $pegawaiModel = new ModelPegawai();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'pangkat' => $this->request->getPost('pangkat'),
            'id_bidang' => $this->request->getPost('id_bidang'),
            'jabatan' => $this->request->getPost('jabatan'),
            'role' => $this->request->getPost('role')
        ];
        $pegawaiModel->insert($data);

        return view('admin/data_akun');
    }
}
