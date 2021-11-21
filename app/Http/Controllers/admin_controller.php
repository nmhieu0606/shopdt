<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin_controller extends Controller
{
    public function index(){
        return view('layout.admin');
    }
    public function login(){
        return view('admin.login');
    }
    public function postlogin(Request $request){
        if(Auth::attempt(['tendangnhap'=>$request->tendangnhap, 'password'=>$request->password]))
        {
            return redirect('admin/');
        }
        else
        {
            return redirect('admin/login');
            
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
