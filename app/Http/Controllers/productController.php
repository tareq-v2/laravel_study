<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function create(){
        return view('Backend.components.addProduct');
    }
}
