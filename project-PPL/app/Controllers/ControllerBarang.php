<?php

namespace App\Controllers;

use App\Models\modelBarang;

class ControllerBarang extends BaseController
{
    protected $modelBarang;

    public function __construct()
    {
        $this->modelBarang = new modelBarang();
    }

    public function index()
    {
        // Panggil seeder untuk mengisi data jika belum ada data di database
        $this->callSeederIfNeeded();

        $data['barang'] = $this->modelBarang->findAll();
        return view('v_display_barang', $data);
    }

    public function delete($id)
    {
        $this->modelBarang->deleteBarang($id);
        return redirect()->to('/barang');
    }

    public function search()
    {
        $keyword = $this->request->getPost('keyword');
        $data['barang'] = $this->modelBarang->searchBarang($keyword);
        return view('v_display_barang', $data);
    }

    public function showInsertForm()
    {
        // Ambil kode barang terakhir
        $lastBarang = $this->modelBarang->generateKodeBarang();
        $kodeBarang = ($lastBarang) ? (int)$lastBarang['kodeBarang'] + 1 : 1;


        // Kirim kode barang ke halaman insert barang
        $data['kodeBarang'] = $kodeBarang;

        return view('v_insert_barang', $data);
    }

    public function insert()
    {
        // Mendapatkan data dari form
        $namaBarang = $this->request->getPost('namaBarang');
        $hargaBarang = $this->request->getPost('hargaBarang');

        // Menyusun data untuk dimasukkan ke database
        $data = [
            'namaBarang' => $namaBarang,
            'hargaBarang' => $hargaBarang
        ];

        // Memanggil fungsi insertBarang dari model
        $this->modelBarang->insertBarang($data);

        // Redirect kembali ke halaman barang setelah insert selesai
        return redirect()->to('/barang');
    }

    public function showUpdateForm($kodeBarang)
    {
        // Ambil data barang berdasarkan kodeBarang
        $data['barang'] = $this->modelBarang->find($kodeBarang);
        return view('v_update_barang', $data);
    }

    public function update()
    {
        // Mendapatkan data dari form
        $kodeBarang = $this->request->getPost('kodeBarang');
        $namaBarang = $this->request->getPost('namaBarang');
        $hargaBarang = $this->request->getPost('hargaBarang');

        // Menyusun data untuk dimasukkan ke database
        $data = [
            'namaBarang' => $namaBarang,
            'hargaBarang' => $hargaBarang,
            'kodeBarang' => $kodeBarang
        ];

        // Memanggil fungsi updateBarang dari model
        $this->modelBarang->updateBarang($data);

        // Redirect kembali ke halaman barang setelah update selesai
        return redirect()->to('/barang');
    }

    private function callSeederIfNeeded()
    {
        $db = \Config\Database::connect();
        $barangCount = $db->table('barang')->countAllResults();
        if ($barangCount == 0) {
            $seeder = new \App\Database\Seeds\BarangSeeder();
            $seeder->run();
        }
    }
}
