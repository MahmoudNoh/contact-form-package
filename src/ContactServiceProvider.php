<?php

namespace Noh\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/views', 'contact');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->mergeConfigFrom(__DIR__.'/config/contact.php', 'contact');

        $this->publishes([
           __DIR__.'/config/contact.php' => config_path('contact.php'),
           __DIR__.'/views' => resource_path('views/vendor/contact'),
        ]);



    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Noh\Contact\Http\Controllers\ContactController');


    }


}
