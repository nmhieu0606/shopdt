<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use App\Models\chucvu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\uploads;
use Carbon\Carbon;


class nhanvien_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=nhanvien::all();
        return view('admin.nhanvien.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chucvu=chucvu::all();
        return view('admin.nhanvien.create',compact('chucvu'));
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
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'cmnd.required' => 'CMND không được bỏ trống',
            'cmnd.max' => 'CMND không được vượt quá 12 ký tự',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
        ];

        $request->validate([
			'hovaten' => 'required|string|max:255',
			'diachi' => 'required|string|max:255',
            'sdt' => 'required|string|max:10',
            'cmnd' => 'required|string|max:12',
            'tendangnhap' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|string|max:255',
			
		],$messages);

        //
        $data=new nhanvien;
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $data->tendangnhap=$request->tendangnhap;
        $data->password=bcrypt($request->password);
        $data->email=$request->email;
       

        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $tenhinh=time().'.'.$request->nhanvien.'.'.$ex;
            $file->move(public_path('uploads'), $tenhinh);
        }
        $request->merge(['anh'=>$tenhinh]);
        $data->anh=$request->anh;
        
        if($data->save()) {
            return redirect('admin/nhanvien');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show(nhanvien $nhanvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chucvu=chucvu::all();
        $data=nhanvien::find($id);
        return view('admin.nhanvien.edit',compact('data','chucvu'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $messages = [
            'hovaten.required' => 'Họ và tên không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'cmnd.required' => 'CMND không được bỏ trống',
            'cmnd.max' => 'CMND không được vượt quá 12 ký tự',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
        ];

        $request->validate([
			'hovaten' => 'required|string|max:255',
			'diachi' => 'required|string|max:255',
            'sdt' => 'required|string|max:10',
            'cmnd' => 'required|string|max:12',
            'tendangnhap' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|string|max:255',
			
		],$messages);

        //
        $data=nhanvien::find($id);
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $data->tendangnhap=$request->tendangnhap;
        $data->email=$request->email;
        if(!empty($request->password)) 
        $data->password =bcrypt($request->password);

        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-nhanvien'.'.'.$ex;
            $file->move(public_path('uploads'),$file_name);

            $nhanvien=nhanvien::find($id);
            $request->merge(['anh'=>$file_name]);
        $data->anh=$request->anh;    

        if($data->save()) {
           return redirect('admin/nhanvien');
        }
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhanvien $nhanvien)
    {
        //
    }
    public function delete($id)
    {
        $data=nhanvien::find($id);
        if ($data->delete()){
            return redirect()->back();
        }   
    }
}
