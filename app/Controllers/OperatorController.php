<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangMasuk;

class OperatorController extends BaseController
{
    public function halaman_operator()
    {
        return view('operator/halaman_operator');
    }

    public function halaman_laporan_stok()
    {
        return view('operator/halaman_laporan_stok');
    }

    public function cetak_laporan()
    {
        // $tglawal = $this->request->request->getPost('tglawal');
        // $tglakhir = $this->request->request->getPost('tglakhir');
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];

        return view('operator/cetak_laporan', $data);
    }

    public function reset_opname(){
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();
        // $barang = $data_barang->select('status_barang')->first();

        for ($i=0; $i < count($barang); $i++) { 
            $id = $barang[$i]['id'];
            
            $data = [
                'status_barang' => '0'
            ];

        $data_barang->update($id,$data);
        }

        return redirect()->to('/operator/halaman_data_barang');
    }

    public function halaman_data_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];
        return view('operator/master_data/halaman_data_barang', $data);
    }
    public function halaman_input_barang()
    {
        return view('operator/master_data/halaman_input_barang');
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
            'status_barang' => '0',
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
            'stok_awal' => $this->request->getVar('stok_awal'),
            'stok_menjadi' => $this->request->getVar('stok_menjadi'),
            'status_barang' => '1',
            'tanggal' => date('y-m-d'),
        ];

        $data_barang->update($id, $data);
        return redirect()->to('/operator/halaman_data_barang');
    }

    public function delete_dataBarang($id)
    {
        $data_barang = new ModelBarang();
        $data_barang->delete($id);

        return redirect()->to('/operator/halaman_data_barang');
    }

    public function halaman_data_barang_masuk()
    {
        $data_barang = new ModelBarangMasuk();
        $barang = $data_barang->select('*')
                -> join('data_barang','data_barang_masuk.id_barang=data_barang.id')
                -> get();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];
        return view('operator/barang_masuk/halaman_data_barang_masuk', $data);
    }
    public function halaman_input_barang_masuk()
    {
        $barang = new ModelBarang();
        $data_barang = $barang->findAll();

        $data = [
            'title' => 'Permintaan',
            'data_barang' => $data_barang,
        ];

        return view('operator/barang_masuk/halaman_input_barang_masuk',$data);
    }

    public function save_dataBarang_masuk()
    {
        $data_barang = new ModelBarang();
        $data_barangMasuk = new ModelBarangMasuk();
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_barang' => $this->request->getPost('nama_barang'),
            'jumlah_barangMasuk' => $this->request->getPost('stok_masuk'),
            'tanggal_barangMasuk' => date('y-m-d'),
        ];

        $data_barangMasuk->insert($data);

        $id = $this->request->getPost('nama_barang');
        $barang = $data_barang->select('stok_menjadi')->where('id',$id)->first();
        $jumlah = $this->request->getPost('stok_masuk');
        $Masuk = $barang['stok_menjadi'] + $jumlah;

        $dataMasuk = [
            'stok_menjadi' => $Masuk
        ];

        $data_barang->update($id,$dataMasuk);

        return redirect()->to('/operator/halaman_data_barang_masuk');
    }

    public function Update_dataBarang_masuk($id_barang_masuk)
    {
        $data_barang = new ModelBarang();
        $data_barangMasuk = new ModelBarangMasuk();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_barang');
        $barang = $data_barang->select('stok_menjadi')->where('id',$id)->first();
        $id_Masuk = $this->request->getPost('id_barang_masuk');
        $barangMasuk = $data_barangMasuk->select('jumlah_barangMasuk')->where('id_barang_masuk',$id_Masuk)->first();
        $jumlah = $this->request->getPost('stok_masuk');

        $Masuk = $barang['stok_menjadi'] - $barangMasuk['jumlah_barangMasuk'];
        $MasukFiks = $Masuk + $jumlah;

        $dataMasuk = [
            'stok_menjadi' => $MasukFiks
        ];

        $data_barang->update($id,$dataMasuk);

        $data = [
            'jumlah_barangMasuk' => $this->request->getVar('stok_masuk'),
            'tanggal_barangMasuk' => date('y-m-d'),
        ];

        $data_barangMasuk->update($id_barang_masuk, $data);


        return redirect()->to('/operator/halaman_data_barang_masuk');
    }

    public function delete_dataBarang_masuk($id_barang_masuk)
    {
        $data_barang = new ModelBarang();
        $data_barangMasuk = new ModelBarangMasuk();

        $id_barang = $data_barangMasuk->select('id_barang')->where('id_barang_masuk',$id_barang_masuk)->first();
        $stokMasuk = $data_barangMasuk->select('jumlah_barangMasuk')->where('id_barang_masuk',$id_barang_masuk)->first();
        $stokMenjadi = $data_barang->select('stok_menjadi')->where('id',$id_barang)->first();

        $stokAkhir = $stokMenjadi['stok_menjadi']-$stokMasuk['jumlah_barangMasuk'];

        $dataMasuk = [
            'stok_menjadi' => $stokAkhir
        ];

        $data_barang->update($id_barang,$dataMasuk);

        $data_barangMasuk->delete($id_barang_masuk);

        return redirect()->to('/operator/halaman_data_barang_masuk');
    }
}
