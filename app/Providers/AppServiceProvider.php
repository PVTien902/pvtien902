<?php

namespace App\Providers;

use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Cart;

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
        view ()->composer('header',function($view){
            $loai_sanpham = ProductType::all();
            
            $view -> with('loai_sanpham',$loai_sanpham);     
        });
        view()->composer('header',function($view){
            if(Session('cart')){

                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),
                'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice,
                 'totalQty'=>$cart->totalQty]);
            }
        });

        view ()->composer('page.dathang',function($view){
            $loai_sanpham = ProductType::all();
            
            $view -> with('loai_sanpham',$loai_sanpham);     
        });
        view()->composer('page.dathang',function($view){
            if(Session('cart')){

                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),
                'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice,
                 'totalQty'=>$cart->totalQty]);
            }
        });
        
         
    }
}
