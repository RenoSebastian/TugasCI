<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSouvenir extends Model
{
    protected $table = 'souvenir';

    protected $primaryKey = 'idsouvenir';

    protected $allowedFields = ['namasouvenir', 'harga', 'stok', 'namafilegbr', 'berat']; // Sesuaikan dengan field di tabel souvenir

    // Function untuk mengambil data souvenir
    public function getSouvenir($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idsouvenir' => $id]);
        }
    }

    // Function untuk update data souvenir
    public function updateStock($id, $data)
    {
        return $this->update(['idsouvenir' => $id], $data);
    }
}

