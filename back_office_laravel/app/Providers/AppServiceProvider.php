<?php

namespace App\Providers;

use Braintree\Configuration as Braintree_Configuration;
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
        Braintree_Configuration::environment(env('BRAINTREE_ENV'));
        Braintree_Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
        $this->app->singleton(Faker::class, function () {
            return FakerFactory::create('it_IT');
        });
    }
}
