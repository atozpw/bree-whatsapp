<?php

namespace Atozpw\BreeWhatsapp;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bree-whatsapp.php' => config_path('bree-whatsapp.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bree-whatsapp', function() {
            return true;
        });

        App::bind('bree-whatsapp', function() {
            return new BreeWhatsapp;
        });
    }
}