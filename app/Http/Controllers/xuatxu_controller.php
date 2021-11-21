<?php

namespace App\Http\Controllers;

use App\Models\xuatxu;
use Illuminate\Http\Request;

class xuatxu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xuatxu=xuatxu::all();
        return view('admin.xuatxu.index',compact('xuatxu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.xuatxu.create');
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
            'xuatxu.required' => 'Xuất xứ không được bỏ trống',
        ];

        $request->validate([
			'xuatxu' => 'required|string|max:255',

		],$messages);

        $xuatxu=new xuatxu;
        $xuatxu->xuatxu=$request->xuatxu;
        $xuatxu->save();
        return redirect('admin/xuatxu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\xuatxu  $xuatxu
     * @return \Illuminate\Http\Response
     */
    public function show(xuatxu $xuatxu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\xuatxu  $xuatxu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xuatxu=xuatxu::find($id);

        return view('admin.xuatxu.edit',compact('xuatxu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\xuatxu  $xuatxu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'xuatxu.required' => 'Xuất xứ không được bỏ trống',
        ];

        $request->validate([
			'xuatxu' => 'required|string|max:255',

		],$messages);
        
        $xuatxu=xuatxu::find($id);
        $xuatxu->xuatxu=$request->xuatxu;
        $xuatxu->save();
        return redirect('admin/xuatxu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\xuatxu  $xuatxu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $xuatxu=xuatxu::find($id);
        if($xuatxu->delete()){
            return redirect()->back();
        }
    }
}
