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


Route::group(['prefix'=>'admin'],function(){
    
    
    Route::get('/','admin_controller@index')->name('admin.index');
    Route::get('/xuatxu/detele/{id}','xuatxu_controller@delete')->name('xuatxu.delete');
    Route::get('/nhanhieu/detele/{id}','nhanhieu_controller@delete')->name('nhanhieu.delete');
    Route::resources([
        'nhanhieu' =>'nhanhieu_controller',
        'xuatxu' =>'xuatxu_controller',
    ]);


});
