<?php

namespace App\Models;

use CodeIgniter\Model;

class modelBarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'kodeBarang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['namaBarang', 'hargaBarang', 'fotoBarang'];

    public function deleteBarang($id)
    {
        $db = db_connect();
        $query = 'DELETE FROM barang WHERE kodeBarang = ?';
        $db->query($query, [$id]);
    }

    public function searchBarang($keyword)
    {
        $db = db_connect();
        $keyword = strtolower($keyword);
        $query = "SELECT * FROM barang WHERE LOWER(namaBarang) LIKE '%$keyword%'";
        $result = $db->query($query)->getResultArray();
        return $result;
    }

    // Method untuk mendapatkan kode barang terakhir
    public function generateKodeBarang()
{
    $db = db_connect();

    // Query SQL untuk mengambil kode barang terakhir
    $query = $db->query("SELECT kodeBarang FROM barang ORDER BY kodeBarang DESC LIMIT 1");
    $result = $query->getRow();

    // Jika ada hasil dari query
    if ($result) {
        // Mendapatkan nomor urutan terakhir dari kode barang
        $lastNumber = intval(substr($result->kodeBarang, 1));

        // Increment nomor urutan untuk mendapatkan kode baru
        $newNumber = $lastNumber + 1;

        // Format kode baru dengan padding nol di depan
        $newKode = 'B' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        // Jika tidak ada data barang sebelumnya, membuat kode baru dengan urutan 001
        $newKode = 'B001';
    }

    return $newKode;
}


    // Method untuk menyimpan barang ke database bersama dengan gambar
    public function insertBarang($data)
    {
        // Generate kode barang baru
        $data['kodeBarang'] = $this->generateKodeBarang();
    
        $db = db_connect();
        $query = "INSERT INTO barang (kodeBarang, namaBarang, hargaBarang, fotoBarang) VALUES (?, ?, ?, ?)";
        $db->query($query, [$data['kodeBarang'], $data['namaBarang'], $data['hargaBarang'], $data['fotoBarang']]);
    
}



    public function updateBarang($data)
    {
        $db = db_connect();
        $query = "UPDATE barang SET namaBarang = ?, hargaBarang = ? WHERE kodeBarang = ?";
        $db->query($query, [$data['namaBarang'], $data['hargaBarang'], $data['kodeBarang']]);
    }
}
