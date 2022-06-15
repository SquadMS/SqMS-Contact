<?php

namespace SquadMS\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
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
        /* Configuration */
        $this->mergeConfigFrom(__DIR__.'/../config/sqms-contact.php', 'sqms-contact');
        
        /* Load Migrations */
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        /* Load Translations */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sqms-contact');

        /* Publish Assets */
        if ($this->app->runningInConsole()) {
            // Publish assets
            $this->publishes([
                __DIR__.'/../public' => public_path('themes/sqms-contact'),
            ], 'assets');
        }
    }
}
