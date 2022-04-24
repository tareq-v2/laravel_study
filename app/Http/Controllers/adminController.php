<?php

namespace App\Http\Controllers;

use App\Models\create_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = create_admin::all();
        return view('Backend.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.admin.create');
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
            'email' => 'required|unique:create_admins',
            'phone' => 'required|unique:create_admins',
            'password' => 'required|min:3|max:8',
            'confirm_password' => 'required_with:password|same:password',
        ]);

        $request['password'] = Hash::make($request->password);

        create_admin::create($request->all());

        return redirect()->back()->with('msg', "Data Store Done !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '3';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = create_admin::where('id',$id)->first();
        return view('Backend.admin.edit', compact('info'));
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

        // return $request->all();
        if($request->password !=null)
        {
            $request->validate([
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required|min:3|max:8',
                'confirm_password' => 'required_with:password|same:password',
            ]);

            $request['password']=Hash::make($request->password);
            create_admin::where('id',$id)->update($request->except('_method','confirm_password'));
        }else{
            $request->validate([
                'email' => 'required',
                'phone' => 'required',
            ]);
            create_admin::where('id',$id)->update($request->except('_method','confirm_password','password'));
        }

        return redirect()->back()->with('msg','update successfully done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        create_admin::find($id)->delete();
        return redirect()->back();
    }
}
