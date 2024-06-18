<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function display(): string
    {
        return view('coba');
    }
}
