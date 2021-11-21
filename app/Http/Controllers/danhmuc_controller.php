<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use Illuminate\Http\Request;

class danhmuc_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=danhmuc::all();
        return view('admin.danhmuc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'tendanhmuc.required' => 'Tên danh mục không được bỏ trống',
        ];

        $request->validate([
			'tendanhmuc' => 'required|string|max:255',

		],$messages);

        $data=new danhmuc;
        $data->tendanhmuc=$request->tendanhmuc;
        if($data->save()){
            $data=danhmuc::all();
            return view('admin.danhmuc.index',compact('data'));
        }
        
       
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function show(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = danhmuc::find($id);
        
		return view('admin.danhmuc.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tendanhmuc.required' => 'Tên danh mục không được bỏ trống',
        ];

        $request->validate([
			'tendanhmuc' => 'required|string|max:255',

		],$messages);
        
        $data = danhmuc::find($id);
        $data->tendanhmuc=$request->tendanhmuc;
        $data->save();
        return redirect('admin/danhmuc');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      danhmuc::find($id)->delete();
      return redirect('admin/danhmuc');
       
    }
}
