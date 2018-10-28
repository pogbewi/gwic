<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('pages.blog.index');
    }

    public function show(){
        return view('pages.blog.show');
    }
}
