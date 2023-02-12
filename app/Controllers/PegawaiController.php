<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permintaan;
use App\Models\PermintaanSementara;
use App\Models\ModelBarang;
use App\Models\ModelBarangPermintaan;

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
        $data_barang= $barangNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaanS' => $permintaan,
            'data_barang' => $data_barang,
            'jml_prmtn_sntr' => $permintaanNew->where('nip', session()->get('nip'))->countAllResults(),
        ];
        return view('pegawai/halaman_input_permintaan',$data);
    } 

    // public function getUsers(){

    //     $request = service('request');
    //     $postData = $request->getPost();

    //     $response = array();

    //     // Read new token and assign in $response['token']
    //     $response['token'] = csrf_hash();
    //     $data = array();

    //     if(isset($postData['search'])){

    //           $search = $postData['search'];

    //           // Fetch record
    //           $barang = new ModelBarang();
    //           $userlist = $barang->select('nama_barang,stok_menjadi')
    //                       ->like('nama_barang',$search)
    //                       ->orderBy('nama_barang')
    //                       ->findAll();
    //           foreach($userlist as $user){
    //                 $data[] = array(
    //                       "value" => $user['nama_barang'],
    //                       "label" => $user['stok_menjadi'],
    //                 );
    //           }
    //     }

    //     $response['data'] = $data;

    //     return $this->response->setJSON($response);

    // }

    public function save_permintaan()
    {
        $permintaan = new Permintaan();
        $permintaanSimpan = $permintaan->findAll(); 
        $barangPermintaan = new ModelBarangPermintaan();
        $permintaanSementara = new PermintaanSementara();
        $Sementara = $permintaanSementara->findAll();

        $dataMaster = [
            'nip' => session()->get('nip'),
            'tanggal_permintaan' => date('y-m-d'),
            'status' => '1'
        ];

        $permintaan->insert($dataMaster);
        $id_permintaan = $permintaan->insertID();
        $data_prmnt_smntr = $permintaanSementara->where('nip',session()->get('nip'))->findAll();

        for ($i=0; $i < count($data_prmnt_smntr); $i++) { 
            $data = [
                'id_permintaan' => $id_permintaan,
                'nama_barang' => $data_prmnt_smntr[$i]['nama_barang'],
                'jumlah_permintaan' => $data_prmnt_smntr[$i]['jumlah'],
                'satuan' => $data_prmnt_smntr[$i]['satuan'],
                'keterangan' => $data_prmnt_smntr[$i]['keterangan'],
                'tanggal_permintaan' => date('y-m-d'),
                'nip' => session()->get('nip'),
                'status' => '1'
            ];
            $barangPermintaan->insert($data);
        }
        for ($i=0; $i < count($data_prmnt_smntr); $i++) { 
            $permintaanSementara->where('id',$data_prmnt_smntr[$i]['id'])->delete();
        }

        return redirect()->to('pegawai/halaman_permintaan');
    } 

    public function saveSementara_permintaan()
    {
        $permintaanS = new PermintaanSementara();
        $permintaan = new ModelBarang();

        $id = $this->request->getPost('nama_barang');
        $barang = $permintaan->select('nama_barang')->where('id',$id)->first();
        $satuan = $permintaan->select('satuan')->where('id',$id)->first();
        $stock_awal = $permintaan->select('stok_awal')->where('id',$id)->first();
        if ($stock_awal['stok_awal'] >= $this->request->getPost('jumlah')){
            if($permintaanS->where('nama_barang',$barang)->where('nip',session()->get('nip'))->first() != null){
                $jumlah = $permintaanS->select('jumlah')->where('nama_barang',$barang)->where('nip',session()->get('nip'))->first();
                $jumlahBaru = $jumlah['jumlah'] + $this->request->getPost('jumlah');
                $data = [
                    'nip' => session()->get('nip'),
                    'nama_barang' => $barang,
                    'jumlah' => $jumlahBaru,
                    'satuan' => $satuan,
                    'keterangan' => $this->request->getPost('keterangan'),
                    'tanggal_permintaan' => date('y-m-d'),
                ];
                $permintaanS->where('nama_barang',$barang)->where('nip',session()->get('nip'))->set($data)->update();
                return redirect()->to('pegawai/halaman_input_permintaan');
            }else{
            $data = [
                'nip' => session()->get('nip'),
                'nama_barang' => $barang,
                'jumlah' => $this->request->getPost('jumlah'),
                'satuan' => $satuan,
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal_permintaan' => date('y-m-d'),
            ];
            }

            $permintaanS->insert($data);
            return redirect()->to('pegawai/halaman_input_permintaan');
        }else{
            session()->setFlashdata('stock','Stock Barang Tidak Mencukupi!!!');
            return redirect()->to('/pegawai/halaman_input_permintaan');
        }
        $data = [
            'nip' => session()->get('nip'),
            'nama_barang' => $barang,
            'jumlah' => $this->request->getPost('jumlah'),
            'satuan' => $satuan,
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
        ];
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
            'permintaan' => $permintaan,
        ];
        return view('pegawai/halaman_permintaan',$data);
    }
    public function halaman_stok_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('pegawai/halaman_stok_barang',$data);
    }

    public function halaman_BarangPermintaan($id)
    {
        $permintaanNew = new ModelBarangPermintaan();
        $permintaan= $permintaanNew->select('*')
                    ->join('permintaan_barang','barang_permintaan.id_permintaan=permintaan_barang.id')
                    ->where('id_permintaan',$id)
                    ->get();
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];
        return view('pegawai/halaman_barang_permintaan',$data);
    }

    public function halaman_cetak_permintaan()
    {

        return view('pegawai/halaman_cetak_permintaan');
    }

    public function cetak_permintaan()
    {

        return view('pegawai/cetak_permintaan');
    }
}
