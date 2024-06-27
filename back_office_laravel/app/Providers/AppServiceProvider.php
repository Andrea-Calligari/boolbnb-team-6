<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Faker::class, function () {
            return FakerFactory::create('it_IT');
        });
    }
}
