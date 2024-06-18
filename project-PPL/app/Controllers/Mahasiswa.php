<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        // Panggil seeder untuk mengisi data jika belum ada data di database
        $this->callSeederIfNeeded();

        $data['mahasiswa'] = $this->mahasiswaModel->findAll();
        return view('v_display_models', $data);
    }

    private function callSeederIfNeeded()
    {
        $db = \Config\Database::connect();
        $mahasiswaCount = $db->table('mahasiswa')->countAllResults();
        if ($mahasiswaCount == 0) {
            $seeder = new \App\Database\Seeds\MahasiswaSeeder();
            $seeder->run();
        }
    }
}
?>
