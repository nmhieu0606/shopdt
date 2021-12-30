<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\nhanhieu;
use App\Models\xuatxu;
use App\Models\baohanh;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Validator;

class sanpham_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham=sanpham::all();
        return view('admin.sanpham.index', compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhanhieu=nhanhieu::all();
        $baohanh=baohanh::all();
        $danhmuc=danhmuc::all();
        $xuatxu=xuatxu::all();
        return view('admin.sanpham.create', compact('nhanhieu', 'baohanh', 'xuatxu', 'danhmuc'));
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
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'tensp.unique' => 'Tên sản phẩm đã tồn tại', 
            'gianhap.required' => 'Chưa nhập giá nhập',
            'gianhap.numeric' => 'Không được nhập chữ',  
            'giaxuat.required' => 'Chưa nhập giá bán',       
            'giaxuat.numeric' => 'Không được nhập chữ',
            'soluong.numeric' => 'Không được nhập chữ',
            'soluong.required' => 'Chưa nhập số lượng',
         ];

         $request->validate([
			'tensp'=>'required|max:100|unique:sanpham',
			'gianhap' => 'required|numeric',
            'giaxuat' => 'required|numeric',
            'soluong' => 'required|numeric',
            
			
		],$messages);

        
       

        // $request->validate([
		// 	'tensp' => 'required|unique|string|max:255',
		// 	'gianhap' => 'required|unique|string|max:255',
        //     'giaxuat' => 'required|unique|string|max:255',
        //     'anh'=>'image',
            
            
			
		// ],$messages);



        $sp = new sanpham();
        $sp->tensp = $request->tensp;
        $sp->anh = $request->anh;
        $sp->soluong = $request->soluong;
        $sp->gianhap = $request->gianhap;
        $sp->giaxuat = $request->giaxuat;
        $sp->nhanhieu_id = $request->nhanhieu_id;
        $sp->xuatxu_id = $request->xuatxu_id;
        $sp->baohanh_id = $request->baohanh_id;
        $sp->danhmuc_id = $request->ddanhmuc_id;
        $sp->chitiet = $request->chitiet;

        if($request->has('file')){
            $file=$request->file;
            $ex=$request->file->extension();
            $tenhinh=time().'-'.$request->tensp.'.'.$ex;
            $file->move(storage_path('hinhanh'), $tenhinh);
        }
        $request->merge(['anh'=>$tenhinh]);
        if(sanpham::create($request->all())){
            return redirect('admin/sanpham');
        }
        if($sp->save()) {
            return redirect('admin/sanpham');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(sanpham $sanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nh=nhanhieu::all();
        $xx=xuatxu::all();
        $bh=baohanh::all();
        $dm=danhmuc::all();
        $sp=sanpham::find($id);
        return view('admin.sanpham.edit',compact('sp','nh','xx','bh','dm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'soluong.required'=>'Số lượng sản phẩm không được bỏ trống',
            'soluong.numeric'=>'Không được nhập số',
            'gianhap.required'=>'Giá nhập không được bỏ trống không được bỏ trống',
            'gianhap.numeric'=>'Không được nhập số',
            'giaxuat.required'=>'Giá bán không được bỏ trống không được bỏ trống',
            'giaxuat.numeric'=>'Không được nhập số',
            'chitiet.required'=>'Chi tiết không được bỏ trống',
            

         ];

        $request->validate([
            'tensp' => 'required|',
            'gianhap' => 'required|numeric',
            'giaxuat' => 'required|numeric',
            'soluong' => 'required|numeric',
            'anh' => 'image|max:2048',
            
            
        ], $messages);

		
        $sp=sanpham::find($id);
        $sp->tensp=$request->tensp;
        $sp->anh=$request->anh;
        $sp->soluong = $request->soluong;
        $sp->gianhap = $request->gianhap;
        $sp->giaxuat = $request->giaxuat;
        $sp->nhanhieu_id = $request->nhanhieu_id;
        $sp->xuatxu_id = $request->xuatxu_id;
        $sp->danhmuc_id = $request->danhmuc_id;
        $sp->baohanh_id = $request->baohanh_id;
        $sp->chitiet= $request->chitiet;

        if($request->has('file')){
            $file=$request->file;
            $ex=$request->file->extension();
            $file_name=time().'-sanpham'.'.'.$ex;
            $file->move(storage_path('hinhanh'),$file_name);

            $sanpham=sanpham::find($id);
            $request->merge(['anh'=>$file_name]);
            $sp->anh=$request->anh;    

        if($sp->save()) {
           return redirect('admin/sanpham');
        }

     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $sanpham=sanpham::find($id);
        if ($sanpham->delete()){
            return redirect()->back();
        }   
    }
}
