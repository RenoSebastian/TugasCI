<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Load model
        $modelUser = new \App\Models\ModelUser();

        // Data pengguna yang akan dimasukkan
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT), // Menggunakan password hash untuk keamanan
                'email' => 'admin@example.com',
                'nama' => 'Administrator'
            ],
            [
                'username' => 'user1',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'email' => 'user1@example.com',
                'nama' => 'User Satu'
            ],
            // Tambahkan data pengguna lainnya sesuai kebutuhan
        ];

        // Memasukkan data ke dalam tabel
        foreach ($data as $user) {
            $modelUser->insert($user);
        }
    }
}
