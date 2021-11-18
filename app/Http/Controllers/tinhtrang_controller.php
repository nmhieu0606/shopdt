<?php

namespace App\Http\Controllers;

use App\Models\tinhtrang;
use Illuminate\Http\Request;

class tinhtrang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tinhtrang::all();
        return view('admin.tinhtrang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tinhtrang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new tinhtrang;
        $data->tinhtrang=$request->tinhtrang;
        if($data->save()){
            $data=tinhtrang::all();
            return view('admin.tinhtrang.index',compact('data'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function show(tinhtrang $tinhtrang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tinhtrang::find($id);
        
		return view('admin.tinhtrang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = tinhtrang::find($id);
        $data->tinhtrang=$request->tinhtrang;
        $data->save();
        return redirect('admin/tinhtrang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tinhtrang  $tinhtrang
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        tinhtrang::find($id)->delete();
        return redirect('admin/tinhtrang');
    }
}
