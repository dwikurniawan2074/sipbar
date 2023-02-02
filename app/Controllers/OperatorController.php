<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;

class OperatorController extends BaseController
{
    public function halaman_operator()
    {
        return view('operator/halaman_operator');
    }

    public function halaman_data_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('operator/halaman_databarang',$data);
    }
    public function halaman_input_barang()
    {
        return view('operator/halaman_input_barang');
    }
    
    public function save_dataBarang()
    {
        $data_barang = new ModelBarang();
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'satuan' => $this->request->getPost('satuan'),
            'stok_awal' => $this->request->getPost('stok_awal'),
            'stok_menjadi' => $this->request->getPost('stok_awal'),
            'status' => '0',
            'tanggal' => date('y-m-d'),
        ];

        $data_barang->insert($data);
        return redirect()->to('/operator/halaman_data_barang');
    } 

    public function Update_dataBarang($id)
    {
        $data_barang = new ModelBarang();

        $data = [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'satuan' => $this->request->getVar('satuan'),
            'stok_menjadi' => $this->request->getVar('stok_menjadi'),
            'status' => '1',
            'tanggal' => date('y-m-d'),
        ];

        $data_barang->update($id,$data);
        return redirect()->to('/operator/halaman_data_barang');
    } 

    public function delete_dataBarang($id){
        $data_barang = new ModelBarang();
        $data_barang->delete($id);

        return redirect()->to('/operator/halaman_data_barang');
    }

    public function halaman_laporan_stok()
    {
        return view('operator/halaman_laporan_stok');
    }
}
