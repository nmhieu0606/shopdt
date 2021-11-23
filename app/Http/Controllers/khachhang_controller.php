<?php

namespace App\Http\Controllers;

use App\Models\khachhang;
use Illuminate\Http\Request;

class khachhang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=khachhang::all();
        return view('admin.client.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'hovaten.required' => 'Họ và tên không được bỏ trống',
            'gioitinh.required' => 'Giới tính không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'cmnd.required' => 'Chứng minh không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'email.required' => 'email không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Password không được bỏ trống',
            
        ];


        $request->validate([
            'hovaten'=>'required|max:100',
            'gioitinh'=>'required|numeric',
            'sdt'=>'required|numeric',
            'cmnd'=>'required|numeric',
            'ngaysinh'=>'required',
            'diachi'=>'required|max:100',
            'email'=>'required|max:100',
            'tendangnhap'=>'required|max:100',
            'password'=>'required|max:100',
            
        ],$messages);
        
        $client=new khachhang;
        $client->hovaten=$request->hovaten;
        $client->gioitinh=$request->gioitinh;
        $client->sdt=$request->sdt;
        $client->cmnd=$request->cmnd;
        $client->ngaysinh=$request->ngaysinh;
        $client->diachi=$request->diachi;
        $client->email=$request->email;
        $client->tendangnhap=$request->tendangnhap;
        $client->password=bcrypt($request->password);

        if($client->save()){
            $client=khachhang::all();
            return view('admin.client.index',compact('client'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    
        $client = khachhang::find($id);
		return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'hovaten.required' => 'Họ và tên không được bỏ trống',
            'gioitinh.required' => 'Giới tính không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'cmnd.required' => 'Chứng minh không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'email.required' => 'email không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Password không được bỏ trống',
            
        ];


        $request->validate([
            'hovaten'=>'required|max:100',
            'gioitinh'=>'required|numeric',
            'sdt'=>'required|numeric',
            'cmnd'=>'required|numeric',
            'diachi'=>'required|max:100',
            'email'=>'required|max:100',
            'tendangnhap'=>'required|max:100',
            'password'=>'required|max:100',
            
        ],$messages);

        $client = khachhang::find($id);
        $client->hovaten=$request->hovaten;
        $client->gioitinh=$request->gioitinh;
        $client->sdt=$request->sdt;
        $client->cmnd=$request->cmnd;
        $client->ngaysinh=$request->ngaysinh;
        $client->diachi=$request->diachi;
        $client->email=$request->email;
        $client->tendangnhap=$request->tendangnhap;
        $client->password=bcrypt($request->password);
        if($client->save()){
            $client=khachhang::all();
            return view('admin.client.index',compact('client'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client=khachhang::find($id);
        if ($client->delete()){
            return redirect()->back();
        }   
    }
}
