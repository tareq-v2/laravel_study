<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_info;
use App\Models\item_info;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category_info::all();
        return view('Backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemdata = item_info::get();
        return view('Backend.category.create',compact('itemdata'));
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
            'sl' => 'required',
            'item_id' => 'required',
            'category_name' => 'required'
        ]);

        $data = category_info::create($request->all());

        $file = $request->file('icon');

        if($file)
        {
            $img_name = $data->id.'.'.$file->getClientOriginalExtension();
            $path = '/Backend/categoryImage';
            $file->move(public_path($path), $img_name);
            category_info::where('id', $data->id)->update(
                ['icon' => $img_name]
            );

            return redirect()->back()->with('msg', 'Category add success');
        }


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
        $data = category_info::findOrFail($id);
        $items = item_info::all();
        return view('Backend.category.edit', compact('data', 'items'));
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
        $request->validate([
            'sl' => 'required',
            'item_id' => 'required',
            'category_name' => 'required'
        ]);

        $data = category_info::where('id',$id)->update($request->except('_method','_token','icon'));

        $file = $request->file('icon');

        if($file)
        {
          $chkimg =  category_info::where('id',$id)->pluck('icon')->first();
          if($chkimg){
              $image = public_path().'/Backend/categoryImage/'.$chkimg;
              unlink($image);
          }
            $img_name = $id.'.'.$file->getClientOriginalExtension();
            $path = '/Backend/categoryImage';
            $file->move(public_path($path), $img_name);
            category_info::where('id', $id)->update(
                ['icon' => $img_name]
            );

        }
        return redirect()->back()->with('msg', 'Category add success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $chkimg =  category_info::where('id',$id)->pluck('icon')->first();
          if($chkimg){
              $image = public_path().'/Backend/categoryImage/'.$chkimg;
              unlink($image);
          }
        category_info::where('id', $id)->delete();
        return redirect()->back();
    }
}
