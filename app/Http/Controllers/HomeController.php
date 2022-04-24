<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        slider::get(); //ORM

        DB::table('sliders')->get(); //Query Builder
        $data = null;
        return view('Frontend.Layouts.Home',compact('data'));
    }

    public function showProduct(){
        return view('Frontend.Layouts.Home');
    }

    public function latestOffer(){
        return view('Frontend.Layouts.User.offerFront');
    }

    public function showblog1(){
        return view('Frontend.Layouts.User.offerBlog1');
    }

    public function showblog2(){
        return view('Frontend.Layouts.User.offerBlog2');
    }

    public function showblog3(){
        return view('Frontend.Layouts.User.offerBlog3');
    }

    public function category(){
        return view('Frontend.Layouts.User.category');
    }





    // We can pass associative array as a function arguments
    // public function something($name){
    //     $data = [
    //         'iPhone' => 'iPhone',
    //         'samsung' => 'samsung'
    //     ];
    //     return view('something', [
    //         'tareq' => $data[$name] ?? 'product '. $name . ' Does not exist !'
    //     ]);
    // }
}
