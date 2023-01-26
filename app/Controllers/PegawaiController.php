<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;

class PegawaiController extends BaseController
{
    public function halaman_pegawai()
    {
        return view('pegawai/halaman_pegawai');
    }
    public function halaman_input_permintaan()
    {
        return view('pegawai/halaman_input_permintaan');
    } 

    public function save_permintaan()
    {
        $permintaan = new Permintaan();

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'satuan' => $this->request->getPost('satuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => $this->request->getPost('tanggal_permintaan'),
            'status' => '0'
        ];

        $permintaan->insert($data);
        return view('pegawai/halaman_pegawai');
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
