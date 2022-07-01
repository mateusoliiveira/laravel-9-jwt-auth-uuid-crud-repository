<?php

namespace App\Providers;

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

        //EloquentAbstract
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\Eloquent\UserRepository',
        );

        $this->app->bind(
            'App\Repositories\Contracts\CategoryRepositoryInterface',
            'App\Repositories\Eloquent\CategoryRepository',
        );

        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface',
            'App\Repositories\Eloquent\ProductRepository',
        );

        $this->app->bind(
            'App\Repositories\Contracts\ReviewRepositoryInterface',
            'App\Repositories\Eloquent\ReviewRepository',
        );


        //RequestAbstract
        $this->app->bind(
            'App\Http\Requests\UserInterfaceRequest',
            'App\Http\Requests\UserRequest',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
