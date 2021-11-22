<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'client_controller@index')->name('client.index');
Route::get('/login', 'client_controller@login')->name('client.login');
Route::post('/login', 'client_controller@postlogin')->name('client.postlogin');
Route::get('/logout', 'client_controller@logout')->name('client.logout');

Route::get('/', 'home_controller@index')->name('home.index');
Route::get('admin/login', 'admin_controller@login')->name('admin.login');
Route::post('admin/login', 'admin_controller@postlogin')->name('admin.postlogin');
Route::get('admin/logout', 'admin_controller@logout')->name('admin.logout');

Route::group(['prefix'=>'admin', 'middleware'=>'admin_middleware'], function () {
    
    
    Route::get('/','admin_controller@index')->name('admin.index');

    Route::get('/xuatxu/detele/{id}','xuatxu_controller@delete')->name('xuatxu.delete');
    Route::get('/nhanhieu/detele/{id}','nhanhieu_controller@delete')->name('nhanhieu.delete');

    Route::get('/nhanvien/delete{id}','nhanvien_controller@delete')->name('nhanvien.delete');
    Route::get('/chucvu/delete{id}','chucvu_controller@delete')->name('chucvu.delete');
    Route::get('/khachhang/delete{id}','khachhang_controller@delete')->name('khachhang.delete');

    Route::resources([
        'nhanhieu' =>'nhanhieu_controller',
        'xuatxu' =>'xuatxu_controller',
        'nhanvien' =>'nhanvien_controller',
        'chucvu' =>'chucvu_controller',
        'khachhang' =>'khachhang_controller',
    ]);


});
