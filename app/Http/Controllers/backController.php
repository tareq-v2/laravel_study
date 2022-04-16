<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\create_admin;

class backController extends Controller
{
    public function adminFront(){
        return view('Backend.components.adminFront');
    }

    public function adminLogin(){
        return view('Backend.login');
    }

    public function login(Request $request){
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            // return 0;
            if(Auth('admin')->user()->status == 0){
                Auth('admin')->logout();
                return redirect()->back();
            }
            return redirect('/admin');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth('admin')->logout();
        return redirect('/');
    }
}
