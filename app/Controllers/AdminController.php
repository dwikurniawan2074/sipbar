<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBidang;
use App\Models\ModelPangkat;
use App\Models\ModelPegawai;
use App\Models\ModelRole;

class AdminController extends BaseController
{

    public function halaman_admin()
    {
        return view('admin/halaman_admin');
    }

    public function data_akun()
    {
        $pegawaiModel = new ModelPegawai();
        $bidangModel = new ModelBidang();
        $pangkatModel = new ModelPangkat();
        $roleModel = new ModelRole();

        $pegawai = $pegawaiModel
            ->join('bidang', 'bidang.id=pegawai.id_bidang', 'left')
            ->join('pangkat', 'pangkat.id=pegawai.id_pangkat', 'left')
            ->join('role', 'role.id=pegawai.id_role', 'left')
            ->findAll();

        $bidang = $bidangModel->findAll();
        $pangkat = $pangkatModel->findAll();
        $role = $roleModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'pegawai' => $pegawai,
            'bidang' => $bidang,
            'pangkat' => $pangkat,
            'role' => $role
        ];

        // dd($data);

        return view('admin/data_akun', $data);
    }

    public function input_data()
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


        return view('admin/input_data', $data);
    }

    public function tambah_akun()
    {
        $pegawaiModel = new ModelPegawai();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama_pegawai' => $this->request->getPost('nama'),
            'id_pangkat' => $this->request->getPost('id_pangkat'),
            'id_bidang' => $this->request->getPost('id_bidang'),
            'jabatan' => $this->request->getPost('jabatan'),
            'id_role' => $this->request->getPost('id_role')
        ];
        $pegawaiModel->insert($data);

        return redirect()->to('admin/data_akun');
    }

    public function update_akun($nip)
    {
        $pegawaiModel = new ModelPegawai();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama_pegawai' => $this->request->getPost('nama'),
            'id_pangkat' => $this->request->getPost('id_pangkat'),
            'id_bidang' => $this->request->getPost('id_bidang'),
            'jabatan' => $this->request->getPost('jabatan'),
            'id_role' => $this->request->getPost('id_role')
        ];
        $pegawaiModel->update($nip, $data);

        return redirect()->to('/admin/data_akun');
    }

    public function hapus_akun($nip)
    {
        $pegawai = new ModelPegawai();
        $pegawai->delete($nip);

        return redirect()->to('/admin/data_akun');
    }
}
