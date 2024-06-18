<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Periksa apakah pengguna telah login
        if (!$session->has('id')) {
            // Cek apakah ini adalah rute login, jika ya, lanjutkan tanpa pengalihan
            if ($request->getUri()->getPath() === '/login') {
                return;
            }

            // Jika belum login dan bukan rute login, redirect ke halaman login
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan sesuatu setelah eksekusi metode
    }
}
