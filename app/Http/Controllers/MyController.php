<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function about(){
        $arr=[10,20,30,40];
        $idx=[1,2,3,4];
        return view('about', compact('arr','idx'));
    }
}
