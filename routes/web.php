<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use SquadMS\Contact\Http\Controllers\ContactController;
use SquadMS\Foundation\Helpers\SquadMSRouteHelper;



Route::middleware(['web'])->group(function () {
    SquadMSRouteHelper::localized(function () {
        Route::prefix('contact')->name('contact.')->group(function () {
            Route::get('/', [ContactController::class, 'show'])
                ->name('show');
    
            Route::post('/', [ContactController::class, 'send'])
                ->name('send');
        });
    });
});
