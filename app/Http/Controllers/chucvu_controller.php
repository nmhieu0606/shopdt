<?php

namespace App\Http\Controllers;

use App\Models\chucvu;
use Illuminate\Http\Request;
use Carbon\Carbon;

class chucvu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=chucvu::all();
        return view('admin.chucvu.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.chucvu.create');
        
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
            'tenchucvu.required' => 'Tên chức vụ không được bỏ trống',
            'quyen.required' => 'Quyền không được bỏ trống',
        ];

        $request->validate([
			'tenchucvu' => 'required|string|max:100',
			'quyen' => 'required|string|max:100|',
			
		],$messages);
        
        
        //
        $chucvu= new chucvu;
        $chucvu->tenchucvu=$request->tenchucvu;
        $chucvu->quyen=$request->quyen;
        $chucvu->save();
        return redirect('admin/chucvu');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function show(chucvu $chucvu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chucvu=chucvu::find($id);
        return view('admin.chucvu.edit', compact('chucvu'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tenchucvu.required' => 'Tên chức vụ không được bỏ trống',
            'quyen.required' => 'Quyền không được bỏ trống',
        ];

        $request->validate([
			'tenchucvu' => 'required|string|max:100',
			'quyen' => 'required|string|max:100|',
			
		],$messages);

        //
        $chucvu=chucvu::find($id);
        $chucvu->tenchucvu=$request->tenchucvu;
        $chucvu->quyen=$request->quyen;
        $chucvu->save();
        return redirect('admin/chucvu');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function destroy(chucvu $chucvu)
    {
        //
    }
    public function delete($id)
    {
        $chucvu=chucvu::find($id);
        if ($chucvu->delete()){
            return redirect()->back();
        }   
    }
}
