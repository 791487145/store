<?php

namespace App\Http\Controllers;



class IndexController extends BaiscController
{
    public function index()
    {
        //dd(auth()->id());
        return view('index/index');
    }

    public function welcome()
    {
        return view('index/welcome');
    }
}
