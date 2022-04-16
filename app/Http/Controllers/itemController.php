<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itemController extends Controller
{
    public function create(){
        return view('Backend.components.addItem');
    }
}
