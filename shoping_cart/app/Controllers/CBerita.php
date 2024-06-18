<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\modelberita;

class CBerita extends BaseController
{
    public function index()
    {
        $model = new modelberita();
        $data['berita'] = $model->findAll();
        return view('berita_view', $data);
    }

    public function detail($id)
    {
        $model = new modelberita();
        $data['berita'] = $model->find($id);
        return view('berita_detail', $data);
    }
}
