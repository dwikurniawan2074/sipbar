<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;
use App\Models\Permintaan;
use App\Models\ModelPegawai;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBidang;
use DateTime;
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
                    ->where('barang_permintaan.status','1')
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
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('subkor/halaman_stok_barang', $data);

    }

    public function halaman_stok_barangMasuk()
    {
        $data_barang = new ModelBarangMasuk();
        $barang = $data_barang->select('*')
                -> join('data_barang','data_barang_masuk.id_barang=data_barang.id')
                -> get();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];
        return view('subkor/halaman_data_barang_masuk', $data);

    }
        public function halaman_data_barang_keluar()
    {
        $permintaanNew = new ModelBarangPermintaan();
        $permintaan     = $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                    ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                    ->join('bidang','pegawai.id_bidang=bidang.id')
                    ->where('barang_permintaan.status','2')
                    ->get();

        $data = [
            'title' => 'Data Barang',
            'permintaan' => $permintaan
        ];
        return view('subkor/halaman_data_barang_keluar', $data);
    }

    public function halaman_cetak_barang_keluar()
    {

       $bidangModel = new ModelBidang();
       $bidang = $bidangModel->findAll();
        $data = [
            'bidang' => $bidang,
        ];
        return view('subkor/halaman_cetak_barang_keluar',$data);
    }
    public function laporan_barang_keluar()
    {
        $tglawal = $this->request->getVar('tglawal');
        $tglakhir = $this->request->getVar('tglakhir');
        $bidang = $this->request->getVar('bidang') ?? 'kosong';
        $tanggalawal = new DateTime($tglawal);
        $tanggalakhir = new DateTime($tglakhir);
        $mdlbidang = new ModelBidang();
        $bid2 = $mdlbidang->select('nama_bidang')->where('bidang.id',$bidang)->findAll();
        $bidangs = $bid2[0]['nama_bidang']??'Semua Bidang';
        $permintaanNew = new ModelBarangPermintaan();
        if($bidang=='kosong')
        {
          $permintaan   = $permintaanNew->select('*')
                        ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                        ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                        ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                        ->join('bidang','pegawai.id_bidang=bidang.id')
                        ->where('barang_permintaan.status','2')
                        // ->where('barang_permintaan.tanggal_disetujui','>=',$tglawal)
                        // ->where('barang_permintaan.tanggal_disetujui','<=',$tglakhir)
                        ->get();

        }else{
            $permintaan   = $permintaanNew->select('*')
                        ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                        ->join('data_barang','barang_permintaan.id_barang=data_barang.id')
                        ->join('pegawai','permintaan_barang.nip=pegawai.nip')
                        ->join('bidang','pegawai.id_bidang=bidang.id')
                        ->where('barang_permintaan.status','2')
                        // ->where('barang_permintaan.tanggal_disetujui >=',$tglawal)
                        // ->where('barang_permintaan.tanggal_disetujui <=',$tglakhir)
                        ->where('bidang.id',$bidang)
                        ->get();
        }

        $data = [
            'title' => 'Data Barang',
            'barang' => $permintaan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
            'tanggalawal' => $tanggalawal,
            'tanggalakhir' => $tanggalakhir,
            'bidang'=>$bidangs
        ];
        return view('subkor/laporan_barang_keluar', $data);
    }

    
}