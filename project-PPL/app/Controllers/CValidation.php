<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CValidation extends Controller
{
    public function index()
    {
        return view('v_form_validation');
    }

    public function submit()
    {
        $rules = [
            'nip' => 'required|numeric|exact_length[18]',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required|numeric|min_length[10]|max_length[14]',
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            return view('v_success_validation');
        }
    }
}
