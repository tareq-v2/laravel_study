<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create(){
        return view('Backend.components.addCategory');
    }
}
