<?php

namespace Marvel;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{


     public function boot(): void
    {

        $this->bootConsole();

    }

     public function register(): void
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/shop.php', 'shop');


        // Register the service the package provides.
        $this->app->singleton('shop', function ($app) {
            return new Shop();
        });
    }

     public function bootConsole()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

     protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config//shop.php' => config_path('shop.php'),
        ], 'config');
    }

}