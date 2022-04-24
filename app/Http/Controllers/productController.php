<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_info;
use App\Models\item_info;
use App\Models\category_info;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product_info::all();
        return view('Backend.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = item_info::all();
        $category = category_info::all();
        return view('Backend.product.create', compact('item', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'item_id' => 'required',
            'category_id' => 'required',
            'old_price' => 'required',
        ]);
        // dd($request->all());
        $allData = product_info::create($request->all());

        // $data = DB::table('product_infos')->insertGetId($request->except('_token'));

        // dd($allData);
        $file = $request->file('image');

        if($file)
        {
            $image = $allData->id.'.'.$file->getClientOriginalExtension();
            $path = '/Backend/productImage';
            $file->move(public_path($path), $image);
            product_info::where('id', $allData->id)->update(['image' => $image]);
        }


        return redirect()->back()->with('success', 'product data add Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
