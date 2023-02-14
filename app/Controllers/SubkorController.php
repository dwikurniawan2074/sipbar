<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\Permintaan;
use App\Models\ModelPegawai;



class SubkorController extends BaseController
{
    public function halaman_subkor()
    {
        return view('subkor/halaman_subkor');
    }
    public function halaman_permintaan()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $pgw = new ModelPegawai();
        $permintaan= $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                    ->join('bidang','pegawai.id_bidang=bidang.id')
                    ->get();
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];
        return view('subkor/halaman_permintaan',$data);
    }

    public function Update_permintaan($id_barang_permintaan){
        $permintaan = new ModelBarangPermintaan();

        $data = [
            'jumlah_permintaan' => $this->request->getVar('jumlah'),
        ];

        $permintaan->update($id_barang_permintaan,$data);
        return redirect()->to('subkor/halaman_permintaan');
    }

    public function Setuju_permintaan($id_barang_permintaan){
        $permintaan = new ModelBarangPermintaan();
        $barang = new ModelBarang();
        date_default_timezone_set('Asia/Jakarta');
        
        $jumlah_permintaan = $permintaan->select('jumlah_permintaan')->where('id_barang_permintaan',$id_barang_permintaan)->first();
        $id_barang = $permintaan->select('id_barang')->where('id_barang_permintaan',$id_barang_permintaan)->first();
        $stok = $barang->select('stok_menjadi')->where('id',$id_barang)->first();

        $hasil = $stok['stok_menjadi'] - $jumlah_permintaan['jumlah_permintaan'];

        $jumlah=[
            'stok_menjadi'=> $hasil
        ];

        $barang->update($id_barang,$jumlah);
        
        $data = [
            'status' => '2',
            'jumlah_disetujui' => $jumlah_permintaan,
            'tanggal_disetujui' => date('y-m-d'),
 
        ];

        $permintaan->update($id_barang_permintaan,$data);

        
        return redirect()->to('subkor/halaman_permintaan');
    }
    public function Tolak_permintaan($id_barang_permintaan){
        $permintaan = new ModelBarangPermintaan();

        $data = [
            'status' => '0',
        ];

        $permintaan->update($id_barang_permintaan,$data);
        return redirect()->to('subkor/halaman_permintaan');
    }

    public function halaman_stok_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('subkor/halaman_stok_barang',$data);
    }
}
