<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOngkir extends Model
{
    protected $table      = 'ongkir';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['kodepos_asal', 'kode_pos_tujuan', 'ongkir_per_kg'];

    // Methods and configurations as per your existing ModelOngkir implementation
}
