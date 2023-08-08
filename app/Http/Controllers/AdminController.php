<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function create(){
        if(auth()->guest()){
            abort(403);        
        }
        return view('admin.create');
    }
}
