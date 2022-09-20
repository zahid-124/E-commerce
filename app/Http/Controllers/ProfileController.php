<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function view(){
        return view('admin.profile.view');
    }

    function edit(Request $request){
        print_r($request->all());
        echo "Hello";
        echo $request->name;
        echo $request->email;
    }
}
