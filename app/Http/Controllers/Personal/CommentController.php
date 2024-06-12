<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return view('personal.comment.index');
    }
}
