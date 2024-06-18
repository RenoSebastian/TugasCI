<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Data barang dengan kode barang manual
        $barangData = [
            [
                'kodeBarang' => 'B001',
                'namaBarang' => 'Buku 1',
                'hargaBarang' => rand(1000, 10000)
            ],
            [
                'kodeBarang' => 'B002',
                'namaBarang' => 'Buku 2',
                'hargaBarang' => rand(1000, 10000)
            ],
            // Tambahkan data barang lainnya di sini...
        ];
        
        // Masukkan data barang ke dalam tabel 'barang'
        $this->db->table('barang')->insertBatch($barangData);
    }
}
