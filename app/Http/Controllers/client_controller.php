<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class client_controller extends Controller
{
   

    public function login(){
        return view('client.login');
    }

    public function postlogin(Request $request){
     if(Auth::guard('khachhang')->attempt(['tendangnhap'=>$request->tendangnhap, 'password'=>$request->password])){
       
         return redirect('/');
    }
    else{
        
         return redirect('/login');
    }
    }

    
    public function logout(){
        Auth::guard('khachhang')->logout();
        return view('client.login');
    }
}
