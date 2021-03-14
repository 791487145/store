<?php

namespace App\Http\Controllers;



class IndexController extends BaiscController
{
    public function index()
    {
        return view('index/index');
    }

    public function welcome()
    {
        return view('index/welcome');
    }
}
