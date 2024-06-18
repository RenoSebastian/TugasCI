<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CInfo extends BaseController
{
    public function display()
    {
        return view('v_info');
    }
}
