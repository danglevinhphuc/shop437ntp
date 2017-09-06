<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Categorychild;
use App\Slide;
use App\Products;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer(['admin.layout.menu'],function($view){
            $category = Category::all();
            $view->with(['category'=>$category]);
        });
        view()->composer(['client.layout.top-menu','client.layout.topnonslide'],function($view){
            $slide = Slide::all();
            $category = Category::all();
            $categorychild= Categorychild::all();
            $products_noibat = Products::where('new','=',1)->orderBy('id', 'desc')
                ->limit(3)->get();
            $view->with(['slide'=>$slide,'category'=>$category,'categorychild'=>$categorychild,'products_noibat'=>$products_noibat]);
        });
        view()->composer(['client.layout.sidebar'],function($view){
            $categorys = Category::all();   
            $view->with(['categorys'=>$categorys]);
        });  
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
