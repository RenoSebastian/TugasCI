<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'Nim';
    protected $allowedFields    = ['Nama', 'Umur'];
    
}
