<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helper\shopcard;
use App\Models\sanpham;
class shopcard_controller extends Controller
{
    public function addcard($id,shopcard $shopcard){
       
        $sanpham=sanpham::find($id);
        $shopcard->add($sanpham);
        return redirect()->back();
    }
    public function index(){
        return view('site.shopcard');
    }
    public function up($id,shopcard $shopcard){
        $shopcard->up($id);
        return redirect()->back();
    }
    public function down($id,shopcard $shopcard){
        $shopcard->down($id);
        return redirect()->back();
    }
    public function delete($id,shopcard $shopcard){
        $shopcard->delete($id);
        return redirect()->back();
    }
    public function delete_all(shopcard $shopcard){
        $shopcard->delete_all();
        return redirect()->back();
    }
}
