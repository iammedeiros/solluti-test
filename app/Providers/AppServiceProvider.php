<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
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
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface',
            'App\Repositories\Eloquent\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\StoreRepositoryInterface',
            'App\Repositories\Eloquent\StoreRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);
    }
}
