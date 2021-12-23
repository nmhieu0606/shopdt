<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dathang;
use App\Models\nhanvien;
use App\Models\dathang_chitiet;
class order_controller extends Controller
{
    public function index(){
        $nv=nhanvien::all();
        $od=dathang::orderBy('id','DESC')->get();
        return view('admin.order.index',compact('od','nv'));
    }
    public function orderdetail($id){
      
        $od=dathang::find($id);
        $oddt=dathang_chitiet::where('dathang_id',$id)->get();
       
        return view('admin.order.orderdetail',compact('od','oddt'));
    }
    public function update($id,$nv){
        
      
        $od=dathang::find($id);
        $od->nhanvien_id=$nv;
        $od->save();
       
        return redirect()->back();
    }

    public function delete($id){
        
        $oddt=dathang_chitiet::where('dathang_id',$id)->delete();
        $od=dathang::find($id)->delete();
        return redirect()->back();
    }
}
