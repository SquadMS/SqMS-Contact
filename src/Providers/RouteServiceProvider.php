<?php

namespace SquadMS\Contact\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->booted(function() {
            /* Routes */
            $routesPath = __DIR__.'/../../routes';

            /* WEB routes */
            Route::group([
                'middleware' => ['web'],
            ], function () use ($routesPath) {
                $this->loadRoutesFrom($routesPath.'/web.php');
            });
        });
    }
}
