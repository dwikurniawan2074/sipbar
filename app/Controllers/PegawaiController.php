<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;
use App\Models\PermintaanSementara;
use App\Models\ModelBarang;

class PegawaiController extends BaseController
{
    
    public function halaman_pegawai()
    {
        return view('pegawai/halaman_pegawai');
    }
    public function halaman_input_permintaan()
    {
        $permintaanNew = new PermintaanSementara();
        $permintaan= $permintaanNew->findAll();
        $barangNew = new ModelBarang();
        $barang= $barangNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaanS' => $permintaan,
            'barang' => $barang
        ];
        return view('pegawai/halaman_input_permintaan',$data);
    } 

    public function save_permintaan()
    {
        $permintaan = new Permintaan();
        $data = [
            'nip' => session()->get('nip'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'satuan' => $this->request->getPost('satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
            'status' => '1'
        ];

        $permintaan->insert($data);
        return redirect()->to('pegawai/halaman_permintaan');
    } 

    public function saveSementara_permintaan()
    {
        $permintaan = new PermintaanSementara();

        $data = [
            'nip' => session()->get('nip'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'satuan' => $this->request->getPost('satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
        ];

        $permintaan->insert($data);
        return redirect()->to('pegawai/halaman_input_permintaan');
    } 

    public function Update_permintaan($id)
    {
        $permintaan = new Permintaan();

        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
            'status' => '1'
        ];

        $permintaan->update($id,$data);
        return redirect()->to('pegawai/halaman_permintaan');
    } 

    public function delete_permintaan($id){
        $permintaan = new Permintaan();
        $permintaan->delete($id);

        return redirect()->to('/pegawai/halaman_permintaan');
    }

    public function halaman_permintaan()
    {
        $permintaanNew = new Permintaan();
        $permintaan= $permintaanNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan
        ];
        return view('pegawai/halaman_permintaan',$data);
    }
    public function halaman_stok_barang()
    {
        return view('pegawai/halaman_stok_barang');
    }
}
