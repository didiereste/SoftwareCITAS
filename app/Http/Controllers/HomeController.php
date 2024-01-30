<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function bienvenido()
    {
        return view('admin.index');
    }
}
