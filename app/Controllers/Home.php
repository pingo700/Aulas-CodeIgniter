<?php

namespace App\Controllers;
class Home extends BaseController
{
    public function index()
    {
        $usuarios = new Usuario();
        return view('DataTable');
    }
}
