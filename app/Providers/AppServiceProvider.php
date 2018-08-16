<?php

namespace App\Providers;

use View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin\ProductSection\Type;
use App\Models\Admin\ProductSection\Category;
use App\Models\Admin\ProductSection\SubCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('front_types', Type::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Http/helpers.php';
    }
}
