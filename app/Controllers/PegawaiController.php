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
        $permintaan = $permintaanNew->select('*')
            ->join('data_barang', 'permintaansementara_barang.id_barang=data_barang.id')
            ->join('pegawai', 'permintaansementara_barang.nip=pegawai.nip')
            ->get();
        $barangNew = new ModelBarang();
        $data_barang = $barangNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaanS' => $permintaan,
            'data_barang' => $data_barang,
            'jml_prmtn_sntr' => $permintaanNew->where('nip', session()->get('nip'))->countAllResults(),
        ];
        return view('pegawai/halaman_input_permintaan', $data);
    }

    public function save_permintaan()
    {
        $permintaan = new Permintaan();
        $permintaanSimpan = $permintaan->findAll();
        $barangPermintaan = new ModelBarangPermintaan();
        $permintaanSementara = new PermintaanSementara();
        $Sementara = $permintaanSementara->findAll();
        date_default_timezone_set('Asia/Jakarta');

        $dataMaster = [
            'nip' => session()->get('nip'),
            'tanggal_permintaan' => date('y-m-d'),
            'status_permintaan' => '1'
        ];

        $permintaan->insert($dataMaster);
        $id_permintaan = $permintaan->insertID();
        $data_prmnt_smntr = $permintaanSementara->where('nip', session()->get('nip'))->findAll();

        for ($i = 0; $i < count($data_prmnt_smntr); $i++) {
            $data = [
                'id_permintaan' => $id_permintaan,
                'id_barang' => $data_prmnt_smntr[$i]['id_barang'],
                'jumlah_permintaan' => $data_prmnt_smntr[$i]['jumlah'],
                'keterangan' => $data_prmnt_smntr[$i]['keterangan'],
                'tanggal_permintaan' => date('y-m-d'),
                'nip' => session()->get('nip'),
                'status' => '1'
            ];
            $barangPermintaan->insert($data);
        }
        for ($i = 0; $i < count($data_prmnt_smntr); $i++) {
            $permintaanSementara->where('id', $data_prmnt_smntr[$i]['id'])->delete();
        }

        return redirect()->to('pegawai/halaman_permintaan');
    }

    public function saveSementara_permintaan()
    {
        $permintaanS = new PermintaanSementara();
        $permintaan = new ModelBarang();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('nama_barang');
        // $barang = $permintaan->select('nama_barang')->where('id',$id)->first();
        // $satuan = $permintaan->select('satuan')->where('id',$id)->first();
        $stock_menjadi = $permintaan->select('stok_menjadi')->where('id', $id)->first();
        if ($stock_menjadi['stok_menjadi'] >= $this->request->getPost('jumlah')) {
            if ($permintaanS->where('id_barang', $id)->where('nip', session()->get('nip'))->first() != null) {
                $jumlah = $permintaanS->select('jumlah')->where('id_barang', $id)->where('nip', session()->get('nip'))->first();
                $jumlahBaru = $jumlah['jumlah'] + $this->request->getPost('jumlah');
                $data = [
                    'nip' => session()->get('nip'),
                    'id_barang' => $id,
                    'jumlah' => $jumlahBaru,
                    'keterangan' => $this->request->getPost('keterangan'),
                    'tanggal_permintaan' => date('y-m-d'),
                ];
                $permintaanS->where('id_barang', $id)->where('nip', session()->get('nip'))->set($data)->update();
                return redirect()->to('pegawai/halaman_input_permintaan');
            } else {
                $data = [
                    'nip' => session()->get('nip'),
                    'id_barang' => $id,
                    'jumlah' => $this->request->getPost('jumlah'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'tanggal_permintaan' => date('y-m-d'),
                ];
            }

            $permintaanS->insert($data);
            return redirect()->to('pegawai/halaman_input_permintaan');
        } else {
            session()->setFlashdata('stock', 'Stock Barang Tidak Mencukupi!!!');
            return redirect()->to('/pegawai/halaman_input_permintaan');
        }
        $data = [
            'nip' => session()->get('nip'),
            'id_barang' => $id,
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
        ];
    }

    public function Update_permintaan($id_barang_permintaan)
    {
        $permintaan = new ModelBarangPermintaan();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'jumlah_permintaan' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tanggal_permintaan' => date('y-m-d'),
            'status' => '1'
        ];

        $permintaan->update($id_barang_permintaan, $data);
        return redirect()->to('pegawai/halaman_permintaan');
    }



    public function delete_permintaan($id)
    {
        $permintaan = new Permintaan();
        $barangPermintaan = new ModelBarangPermintaan();


        $barangP = $barangPermintaan->select('*')
            ->where('id_permintaan', $id)
            ->first();
        if ($barangP != null) {
            $barangPermintaan->delete($barangP);
        }

        $permintaan->delete($id);

        return redirect()->to('/pegawai/halaman_permintaan');
    }

    public function delete_permintaan_sementara($id)
    {
        $permintaan = new PermintaanSementara();
    
        $permintaan->delete($id);

        return redirect()->to('/pegawai/halaman_input_permintaan');
    }

    public function delete_permintaan_barang($id)
    {
        $barangPermintaan = new ModelBarangPermintaan();

        $barangPermintaan->delete($id);

        return redirect()->to('/pegawai/halaman_permintaan');
    }

    public function halaman_permintaan()
    {
        $permintaanNew = new Permintaan();
        $permintaan = $permintaanNew->findAll();

        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];
        return view('pegawai/halaman_permintaan', $data);
    }
    public function halaman_stok_barang()
    {
        $data_barang = new ModelBarang();
        $barang = $data_barang->findAll();

        $data = [
            'title' => 'Data Barang',
            'barang' => $barang
        ];
        return view('pegawai/halaman_stok_barang', $data);
    }

    public function halaman_BarangPermintaan($id)
    {
        $permintaanNew = new ModelBarangPermintaan();
        $permintaan = $permintaanNew->select('*')
            ->join('permintaan_barang', 'barang_permintaan.id_permintaan=permintaan_barang.id')
            ->join('data_barang', 'barang_permintaan.id_barang=data_barang.id')
            ->where('id_permintaan', $id)
            ->get();
        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];

        return view('pegawai/halaman_barang_permintaan', $data);
    }

    public function cetak_data_permintaan()
    {
        $permintaanNew = new ModelBarangPermintaan();

        $permintaan = $permintaanNew->select('*')
            ->join('permintaan_barang', 'barang_permintaan.id_permintaan=permintaan_barang.id')
            ->join('data_barang', 'barang_permintaan.id_barang=data_barang.id')
            ->join('pegawai', 'barang_permintaan.nip=pegawai.nip')
            ->findAll();


            $data = [
                'title' => 'Permintaan',
                'permintaan' => $permintaan,
            ];

        return view('pegawai/cetak_data_permintaan', $data);
    }

    public function cetak_permintaan($id)
    {

        $permintaanNew = new ModelBarangPermintaan();
        $permintaan = $permintaanNew->select('*')
            ->join('permintaan_barang', 'barang_permintaan.id_permintaan=permintaan_barang.id')
            ->join('data_barang', 'barang_permintaan.id_barang=data_barang.id')
            ->where('id_permintaan', $id)
            ->get();
        // $data = [
        //     'title' => 'Permintaan',
        //     'permintaan' => $permintaan,
        // ];
        // $data = [
        //     'title' => 'Permintaan',
        //     'permintaan' => $permintaan,
        // ];
        // $permintaan = $modelPermintaan

        // ->join('pegawai', 'pegawai.nip=permintaan_barang.nip', 'left')

        // ->findAll();
        // $dataLaporan = $modelPermintaan->laporanPerPeriode($tglawal, $tglakhir);

        $data = [
            'title' => 'Permintaan',
            'permintaan' => $permintaan,
        ];

        return view('pegawai/cetak_permintaan', $data);
    }
}
