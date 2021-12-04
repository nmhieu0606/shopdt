<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dathang;
use App\Models\dathang_chitiet;
use App\Models\sanpham;
use App\Http\Helper\shopcard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\mail;
use Carbon\Carbon;
class dathang_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('client_mdl');
    }
    public function index(){
        return view('site.order');
    }
    public function add(shopcard $shopcard){
        $id=Auth::guard('khachhang')->user()->id;
        $dathang=new dathang;
        $dathang->khachhang_id=$id;
        $dathang->tinhtrang_id=1;
        $dathang->ngaydathang=Carbon::now();
        $dathang->tongtien=$shopcard->price;
        if($dathang->save()){
            foreach($shopcard->items as $sanpham_id=>$item){
                $price=$item['price'];
                $quantity=$item['quantity'];
                $dathang_chitiet=new dathang_chitiet;
                $dathang_chitiet->dathang_id=$dathang->id;
                $dathang_chitiet->sanpham_id=$sanpham_id;
                $sp=sanpham::find($sanpham_id);
                if($sp->soluong>=$quantity){
                    $sp->soluong-=$quantity;
                    $sp->save();
                    $dathang_chitiet->soluong=$quantity;
                    $dathang_chitiet->dongia=$price*$quantity;
                    $dathang_chitiet->save();
                }
                else{
                    $xoadathang=dathang::find($dathang->id);
                    $xoadathang->delete();
                    return redirect('/shopcard')->with('no','số lượng sản phẩm: '.$sp->tensp.' số lượng chỉ còn '.$sp->soluong.'');
                }
            
            }
            session()->forget('card');
            return redirect('/')->with('yes','Dat thành công');
        }
    }
}
