<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class LikedController extends Controller
{
    public function index()
    {
        return view('personal.liked.index');
    }
}
