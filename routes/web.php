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
Route::get('/', 'home_controller@index')->name('home.index');
Route::get('admin/login', 'admin_controller@login')->name('admin.login');
Route::post('admin/login', 'admin_controller@postlogin')->name('admin.postlogin');
Route::get('admin/logout', 'admin_controller@logout')->name('admin.logout');

Route::group(['prefix'=>'admin', 'middleware'=>'admin_middleware'], function () {
    
    Route::get('/','admin_controller@index')->name('admin.index');
    Route::get('/nhanvien/delete{id}','nhanvien_controller@delete')->name('nhanvien.delete');
    Route::get('/chucvu/delete{id}','chucvu_controller@delete')->name('chucvu.delete');

    Route::resources([
        'nhanhieu' =>'nhanhieu_controller',
        'xuatxu' =>'xuatxu_controller',
        'nhanvien' =>'nhanvien_controller',
        'chucvu' =>'chucvu_controller',
    ]);


});
