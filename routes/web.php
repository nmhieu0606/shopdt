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

Route::get('/shopcard', 'shopcard_controller@index')->name('shopcard.index');
Route::get('/shopcard/add/{id}', 'shopcard_controller@addcard')->name('shopcard.add');
Route::get('/shopcard/up/{id}', 'shopcard_controller@up')->name('shopcard.up');
Route::get('/shopcard/down/{id}', 'shopcard_controller@down')->name('shopcard.down');
Route::get('/shopcard/delete/{id}', 'shopcard_controller@delete')->name('shopcard.delete');
Route::get('/shopcard/deleteall', 'shopcard_controller@delete_all')->name('shopcard.deleteall');
Route::get('/order', 'dathang_controller@index')->name('order.index');
Route::post('/order/add', 'dathang_controller@add')->name('order.add');

Route::get('/', 'home_controller@index')->name('home.index');
Route::get('admin/login', 'admin_controller@login')->name('admin.login');
Route::post('admin/login', 'admin_controller@postlogin')->name('admin.postlogin');
Route::get('admin/logout', 'admin_controller@logout')->name('admin.logout');

Route::group(['prefix'=>'admin', 'middleware'=>'admin_middleware'], function () {
    
    
    Route::get('/','admin_controller@index')->name('admin.index');

    Route::get('/xuatxu/detele/{id}','xuatxu_controller@delete')->name('xuatxu.delete');
    Route::get('/nhanhieu/detele/{id}','nhanhieu_controller@delete')->name('nhanhieu.delete');
    Route::get('/danhmuc/detele/{id}','danhmuc_controller@delete')->name('danhmuc.delete');
    Route::get('/baohanh/detele/{id}','baohanh_controller@delete')->name('baohanh.delete');
    Route::get('/tinhtrang/detele/{id}','tinhtrang_controller@delete')->name('tinhtrang.delete');
    Route::get('/nhanvien/delete{id}','nhanvien_controller@delete')->name('nhanvien.delete');
    Route::get('/chucvu/delete{id}','chucvu_controller@delete')->name('chucvu.delete');
    Route::get('/khachhang/delete{id}','khachhang_controller@delete')->name('khachhang.delete');
    Route::get('/sanpham/delete{id}','sanpham_controller@delete')->name('sanpham.delete');
    Route::resources([
        'nhanhieu' =>'nhanhieu_controller',
        'xuatxu' =>'xuatxu_controller',
        'danhmuc' =>'danhmuc_controller',
        'baohanh' =>'baohanh_controller',
        'tinhtrang' =>'tinhtrang_controller',
        'nhanvien' =>'nhanvien_controller',
        'chucvu' =>'chucvu_controller',
        'khachhang' =>'khachhang_controller',
        'sanpham'   =>'sanpham_controller',
    ]);


    

    


});
