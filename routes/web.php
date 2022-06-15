<?php

use Illuminate\Support\Facades\Route;
use SquadMS\Foundation\Helpers\SquadMSRouteHelper;
use SquadMS\Contact\Http\Controllers\ContactController;

SquadMSRouteHelper::localized(function() {
    Route::prefix('contact')->as('contact.')->group(function() {
        Route::get('/', [ContactController::class, 'show'])
            ->name('show');

        Route::post('/', [ContactController::class, 'send'])
            ->name('send');
    });
});