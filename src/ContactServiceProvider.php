<?php

namespace SquadMS\Rules;

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
    }
}
