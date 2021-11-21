<?php

namespace App\Http\Controllers;

use App\Models\nhanhieu;
use Illuminate\Http\Request;

class nhanhieu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=nhanhieu::all();
        return view('admin.nhanhieu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhanhieu.create');
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
            'nhanhieu.required' => 'Tên nhãn hiệu không được bỏ trống',
        ];

        $request->validate([
			'nhanhieu' => 'required|string|max:100',

		],$messages);

        $data=new nhanhieu;
        $data->nhanhieu=$request->nhanhieu;
        if($data->save()){
            $data=nhanhieu::all();
            return redirect('admin/nhanhieu');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanhieu  $nhanhieu
     * @return \Illuminate\Http\Response
     */
    public function show(nhanhieu $nhanhieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanhieu  $nhanhieu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = nhanhieu::find($id);
        
		return view('admin.nhanhieu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanhieu  $nhanhieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nhanhieu.required' => 'Tên nhãn hiệu không được bỏ trống',
        ];

        $request->validate([
			'nhanhieu' => 'required|string|max:100',

		],$messages);
        
        $data = nhanhieu::find($id);
        $data->nhanhieu=$request->nhanhieu;
        if($data->save()){
            $data=nhanhieu::all();
            return redirect('admin/nhanhieu');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanhieu  $nhanhieu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
       $data= nhanhieu::find($id)->delete();
       if( $data)
            return redirect('admin/nhanhieu');
    }
}
