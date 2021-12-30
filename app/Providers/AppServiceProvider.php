<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\sanpham;
use App\Http\Helper\shopcard;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useBootstrap();
        view()->composer('*',function($view){
            $view->with([
                //'danhmuc'=>danhmuc::search()->paginate(10),
               // 'giohang'=>new giohang(),
                //'sp'=>sanpham::search()->paginate(10),
                //'sp'=>sanpham::orderBy('id','DESC')->paginate(10),
                'card'=>new shopcard(),
                //'nv'=>nhanvien::all() 
            ]);

        });
    }
}
