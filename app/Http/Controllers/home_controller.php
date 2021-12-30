<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use App\Helper\giohang;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Mail;
use File;
use Validator;
use Illuminate\Support\Facades\Hash;

class home_controller extends Controller
{
    public function index(){
        $sanpham=sanpham::all();
        return view('site.home',compact('sanpham'));
    }
    public function get_dangnhap(){
        return view('client.login');
  
     }
    public function getdangky(){

        return view('dangky');
   
     }
     public function postdangky(Request $request){
         
        $validator=Validator::make($request->all(),[
             'hovaten'=>'required',
             'gioitinh'=>'numeric|required',
             'cmnd'=>'required|numeric',
             'diachi'=>'required',
             'sdt'=>'required|numeric',
             'email'=>'required|unique:khachhang|email',
             'tendangnhap'=>'required|unique:khachhang',
             'password'=>'required',
             'password_c'=>'required|same:password',
   
         ],[
             'hovaten.required'=>'Họ và tên không được bỏ trống',
             'gioitinh.required'=>'gioi tinh không được bỏ trống',
             'cmnd.required'=>'gioi tinh không được bỏ trống',
             'cmnd.numeric'=>'cmnd phải là số',
             'diachi.required'=>'dia chi không được bỏ trống',
             'sdt.required'=>'sdt không được bỏ trống',
             'sdt.numeric'=>'sdt phải là số',
             'email.required'=>'email không được bỏ trống',
             'email.email'=>'Định dạng email không đúng',
             'email.unique'=>'email đã được sử dụng',
             'tendangnhap.required'=>'ten dang nhap không được bỏ trống',
             'tendangnhap.unique'=>'ten dang nhap đã được sử dụng',
             'password.required'=>'mật khẩu không được bỏ trống',
             'password_c.required'=>'xác nhận mật khẩu không được bỏ trống',
             'password_c.same'=>'xác nhận mật khẩu phải trùng ',
             
         ]);
         if($validator->passes()){
            $token=strtoupper(Str::random(10));
            $data=$request->only('tendangnhap','email','hovaten','ngaysinh','gioitinh','diachi','sdt','cmnd');
            $data['password']=bcrypt($request->password);
            $data['token']=$token;
            $data['status']=0;
            if($kh=khachhang::create($data)){   
                Mail::send('email.kickhoat_tk',compact('kh'),function($email) use($kh){
                    $email->subject('ShopMobile - Xác nhận tài khoản');
                    $email->to($kh->email,$kh->hovaten);
                });
                // return response()->json([[1]]);
                return redirect('/dangnhap/index')->with('yes','Bạn đã đăng ký thành công vui lòng kích hoạt tài khoản qua email');  
            }
   
         }
         return response()->json(['error'=>$validator->errors()->all()]);
     }
     public function kichhoat($khachhang,$token){
        $data=khachhang::find($khachhang);
       if($data->token===$token){
            $data->status=1;
            $data->token=null;
            $data->save();
            return redirect('/dangnhap/index')->with('yes','Bạn đạ kích hoạt tài khoản thành công vui lòng đăng nhập');
       }
        else{
           return redirect('/dangnhap/index')->with('no','Lỗi kích hoạt tài khoản');
       }
    }
    
    public function taikhoan(){
        $data= Auth::guard('khachhang')->user();
         return view('khachhang.index',compact('data'));
 
     }
    
    
}
 