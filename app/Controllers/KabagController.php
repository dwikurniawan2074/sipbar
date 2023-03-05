<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\ModelPegawai;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBidang;

class KabagController extends BaseController
{
    public function halaman_kabag()
    {
        return view('kabag/halaman_kabag');
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

        return view('kabag/halaman_permintaan', $data);
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
        return view('kabag/halaman_stok_barang',$data);
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
        return view('kabag/halaman_data_barang_masuk', $data);

    }
}
