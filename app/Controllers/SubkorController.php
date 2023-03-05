<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\Permintaan;
use App\Models\ModelPegawai;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBidang;


class SubkorController extends BaseController
{
    public function halaman_subkor()
    {
        return view('subkor/halaman_subkor');
    }
    public function halaman_permintaan()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $data_barang = new ModelBarang();
        $permintaanBarang = new Permintaan();
        $pegawai = new ModelPegawai();
        $bidang = new ModelBidang();

        $permintaan= $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id','left')
                    ->join('data_barang','barang_permintaan.id_barang=data_barang.id','left')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip','left')
                    ->join('bidang','pegawai.id_bidang=bidang.id','left')
                    ->paginate(10,'barang_permintaan');

        $pager = $permintaanNew->pager;

        $stok = $data_barang->findAll();
        $permintaanpgw = $permintaanBarang->findAll();
        $pgw = $pegawai->findAll();
        $bdg = $bidang->findAll();

        $curentPage = $this ->request->getVar('page_barang_permintaan') ? $this->request->getVar('page_barang_permintaan') : 1;
                
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
            'stok' => $stok,
            'pegawai' => $pgw,
            'permintaanPgw'=> $permintaanpgw,
            'bidang' => $bdg,
            'pager' => $pager,
            'currentPage' => $curentPage
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
        $permintaanN = new Permintaan();
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

        $idPermintaan = $permintaan->select('id_permintaan')->where('id_barang_permintaan',$id_barang_permintaan)->first();
        
        $statusNew = [
            'status_permintaan' => '2'
        ];
        
        $permintaanN->update($idPermintaan,$statusNew);
        
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
        $barang = $data_barang->paginate(10,'data_barang');
        $pager = $data_barang->pager;
        $curentPage = $this ->request->getVar('page_data_barang') ? $this->request->getVar('page_data_barang') : 1;

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang,
            'pager' => $pager,
            'currentPage' => $curentPage
        ];
        return view('subkor/halaman_stok_barang', $data);

    }

    public function halaman_stok_barangMasuk()
    {
        $data_barang = new ModelBarang();
        $data_barang_masuk = new ModelBarangMasuk();
        
        $barang = $data_barang_masuk->select('*')
            ->join('data_barang', 'data_barang_masuk.id_barang=data_barang.id','left')
            ->paginate(10,'data_barang_masuk');

        $pager = $data_barang_masuk->pager;

        $StokBarang = $data_barang->findAll();

        $curentPage = $this ->request->getVar('page_data_barang_masuk') ? $this->request->getVar('page_data_barang_masuk') : 1;
    
        $data = [
            'title' => 'Data Barang',
            'barang' => $barang,
            'stok' => $StokBarang,
            'pager' => $pager,
            'currentPage' => $curentPage
        ];
        return view('subkor/halaman_data_barang_masuk', $data);

    }

    
}
