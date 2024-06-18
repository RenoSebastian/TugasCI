<?php

namespace App\Controllers;

use App\Models\modelBarang;
use App\Controllers\BaseController;
use Codeigniter\Pagination\Pager;

class CTemplateBarang extends BaseController
{
    protected $modelBarang;

    public function __construct()
    {
        $this->modelBarang = new modelBarang();
    }

    public function display()
    {
        $pager = \Config\Services::pager();
        $data['barang'] = $this->modelBarang->paginate(3);
        $data['pager'] = $this->modelBarang->pager;
        return view('v_template_barang', $data);

        // $perPage = 5; // Set jumlah item per halaman menjadi 5
        // $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // $data['barang'] = $this->modelBarang->paginate($perPage, 'page');
        
        // $data['pager'] = $this->modelBarang->pager;
        // return view('v_template_barang', $data);
    }

    public function search()
    {
        $keyword = $this->request->getPost('keyword');
        $data['barang'] = $this->modelBarang->searchBarang($keyword);
        return view('v_template_barang', $data);
    }

    public function detail($id)
    {
        $data['barang'] = $this->modelBarang->find($id);
        return view('v_detail_barang', $data);
    }

    public function showInsertForm()
    {
        // Ambil kode barang terakhir
        $lastBarang = $this->modelBarang->generateKodeBarang();
        
        // Jika $lastBarang bukan array, tetapkan nilai 1 sebagai kodeBarang
        $kodeBarang = is_array($lastBarang) ? ($lastBarang['kodeBarang'] + 1) : 1;
    
        // Kirim kode barang ke halaman insert barang
        $data['kodeBarang'] = $kodeBarang;
    
        return view('v_insert_barang', $data);
    }

    public function insert()
    {
        // Mendapatkan data dari form
        $namaBarang = $this->request->getPost('namaBarang');
        $hargaBarang = $this->request->getPost('hargaBarang');
        $fotoBarang = $this->request->getFile('fotoBarang');

        // Menyusun data untuk dimasukkan ke database
        $data = [
            'namaBarang' => $namaBarang,
            'hargaBarang' => $hargaBarang,
            'fotoBarang' => $fotoBarang
        ];

        $data['fotoBarang']->move(ROOTPATH . 'public/foto');
        $data['fotoBarang'] =  $data['fotoBarang']->getName();

        // Memanggil fungsi insertBarang dari model
        $this->modelBarang->insertBarang($data);

        // Redirect kembali ke halaman barang setelah insert selesai
        return redirect()->to(base_url('/Tbarang'));
    }
}
