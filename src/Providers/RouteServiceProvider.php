<?php

namespace SquadMS\Contact\Providers;

use Illuminate\Support\Facades\Config;
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
        /* Routes */
        $routesPath = __DIR__.'/../../routes';

        /* WEB routes */
        Route::group([
            'middleware' => ['web'],
        ], function () use ($routesPath) {
            $this->loadRoutesFrom($routesPath.'/web.php');
        });
    }
}
