<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBidang;
use App\Models\ModelJabatan;
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
        $jabatanModel = new ModelJabatan();
        $roleModel = new ModelRole();

        $pegawai = $pegawaiModel
            ->join('bidang', 'bidang.id=pegawai.id_bidang', 'left')
            ->join('pangkat', 'pangkat.id=pegawai.id_pangkat', 'left')
            ->join('role', 'role.id=pegawai.id_role', 'left')
            ->join('jabatan', 'jabatan.id=pegawai.id_jabatan', 'left')
            ->findAll();

        $jabatan = $jabatanModel->findAll();
        $bidang = $bidangModel->findAll();
        $pangkat = $pangkatModel->findAll();
        $role = $roleModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'bidang' => $bidang,
            'pangkat' => $pangkat,
            'role' => $role
        ];

        return view('admin/data_akun', $data);
    }

    public function input_data()
    {
        $pegawaiModel = new ModelPegawai();
        $bidangModel = new ModelBidang();
        $pangkatModel = new ModelPangkat();
        $roleModel = new ModelRole();
        $jabatanModel = new ModelJabatan();

        $pegawai = $pegawaiModel->findAll();
        $bidang = $bidangModel->findAll();
        $pangkat = $pangkatModel->findAll();
        $role = $roleModel->findAll();
        $jabatan = $jabatanModel->findAll();

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'bidang' => $bidang,
            'jabatan' => $jabatan,
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
            'id_jabatan' => $this->request->getPost('id_jabatan'),
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
            'id_jabatan' => $this->request->getPost('id_jabatan'),
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

    public function data_jabatan()
    {
        $jabatanModel = new ModelJabatan();
        $jabatan = $jabatanModel->findAll();

        $data = [
            'title' => 'Jabatan',
            'jabatan' => $jabatan 
        ];

        return view('admin/data_jabatan', $data);
    }

    public function input_jabatan()
    {
        return view('admin/input_jabatan');
    }

    public function tambah_jabatan()
    {
        $jabatanModel = new ModelJabatan();

        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan')
        ];
        $jabatanModel->insert($data);

        return redirect()->to('admin/data_jabatan');
    }

    public function update_jabatan($id)
    {
        $jabatanModel = new ModelJabatan();

        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan')
        ];
        $jabatanModel->update($id, $data);

        return redirect()->to('/admin/data_jabatan');
    }

    public function hapus_jabatan($id)
    {
        $jabatanModel = new ModelJabatan();
        $jabatanModel->delete($id);

        return redirect()->to('/admin/data_jabatan');
    }
}