<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item_info;
use Illuminate\Support\Facades\DB;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = item_info::all();
        return view('Backend.item.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.components.addItem');
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
            'title' => 'required'
        ]);

       $data = item_info::create($request->all()); //ORM
    //    $data = DB::table('item_infos')->insertGetId($request->except('_token'));  //DB
// return $data;
        $file = $request->file('image');

        if($file){
            $img_name = $data->id.'.'.$file->getClientOriginalExtension();
            $path = '/Backend/ItemImage';
            $file->move(public_path($path), $img_name);
            item_info::where('id',$data->id)->update(['icon'=> $img_name]);
        }

        return redirect()->back()->with('success', 'item info add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = item_info::findOrFail($id);
        return view('Backend.item.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = item_info::where('id', $id)->first();
        return view('Backend.item.edit', compact('data'));
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
            'title' => 'required',
        ]);

       $insert = item_info::where('id', $id)->update($request->except('_method', '_token', 'image'));

       $file = $request->file('image');

       if($file)
       {
        // $pathImage = item_info::findOrFail($id);

        $pathImage = item_info::where('id', $id)->first();
        $image = public_path().'/Backend/ItemImage/'.$pathImage->icon;
        if($pathImage->icon){
            // return $image;
            unlink($image);
        }

        // if(file_exists($image)){

        // }

        $image_name = $id.'.'.$file->getClientOriginalExtension();

         $path = '/Backend/ItemImage';

         $file->move(public_path($path), $image_name);

         item_info::where('id', $id)->update(['icon' => $image_name]);
       }

       return redirect()->back()->with('msg', 'item info update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pathImage = item_info::where('id', $id)->first();
        $image = public_path().'/Backend/ItemImage/'.$pathImage->icon;
        if($pathImage->icon){
            // return $image;
            unlink($image);
        }

        item_info::where('id',$id)->delete();
        return redirect()->back();
    }
}
