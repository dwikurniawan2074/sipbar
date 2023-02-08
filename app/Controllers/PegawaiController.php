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
        $data_barang= $barangNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaanS' => $permintaan,
            'data_barang' => $data_barang
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
        
        $id = $this->request->getPost('nama_barang');

        $nama = $permintaan->find($id);

        dd($nama);
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
        $permintaanS = new PermintaanSementara();
        $permintaan = new ModelBarang();

        $id = $this->request->getPost('nama_barang');
        $barang = $permintaan->select('nama_barang')->where('id',$id)->first();
        $satuan = $permintaan->select('satuan')->where('id',$id)->first();

        $data = [
            'nip' => session()->get('nip'),
            'nama_barang' => $barang,
            'jumlah' => $this->request->getPost('jumlah'),
            'satuan' => $satuan,
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
        ];

        $permintaanS->insert($data);
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
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang'=> $barang
        ];
        return view('pegawai/halaman_stok_barang',$data);
    }

    public function halaman_data_barang()
    {
        
    }
}
