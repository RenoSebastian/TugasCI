<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $mahasiswaData = [];
        for ($i = 1; $i <= 10; $i++) {
            $mahasiswaData[] = [
                'NIM' => '22151100' . $i,
                'Nama' => 'Mahasiswa ' . $i,
                'Umur' => rand(18, 25)
            ];
        }
        $this->db->table('mahasiswa')->insertBatch($mahasiswaData);
    }
}
?>
