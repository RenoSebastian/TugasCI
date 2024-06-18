<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\Controller;

class CLogin extends Controller
{
    public function login()
    {
        // Mendapatkan instance dari request
        $request = \Config\Services::request();

        // Ambil data dari form
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        // Validasi data
        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->to('/login')->withInput()->with('error', 'Username dan password wajib diisi');
        }

        // Cek apakah user ada di database
        $modelUser = new ModelUser();
        $user = $modelUser->getUserByUsername($username);

        if (!$user || !$modelUser->verifyPassword($password, $user)) {
            // Jika user tidak ditemukan atau password salah, kembalikan ke halaman login dengan pesan error
            return redirect()->to('/login')->withInput()->with('error', 'Username atau password salah');
        }

        // Jika login berhasil, buat session dan arahkan ke halaman dashboard
        $session = session();
        $userData = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
            // Anda bisa menambahkan data lain yang perlu disimpan di sesi
        ];
        $session->set($userData);

        // Redirect ke halaman dashboard atau halaman lain yang sesuai
        return redirect()->to('/home');
    }

    public function logout()
    {
        // Hapus semua data sesi dan arahkan ke halaman login
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function index()
    {
        return view('v_login');
    }
}
