<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials.frontend.header', function ($view) {
            $view->with('categories', Category::orderBy('order_id', 'ASC')->get());
            $view->with('newses', News::orderBy('id', 'DESC')->get());
        });
    }
}
