<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('personal.index');
    }
}
