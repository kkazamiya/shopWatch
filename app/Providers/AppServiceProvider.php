<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\WishList;

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
        View::composer('*',function($view){
            $view->with('category',Category::all());
        });
        View::composer('*',function($view){
            if(session('user')){
                $view->with('wish',WishList::where('account_id',session('user')['id'])->count());
            }
            else{
               $view->with('wish',0); 
            }
            
        });

    }
}
