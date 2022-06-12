<?php

namespace SquadMS\Contact\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use SquadMS\Foundation\Facades\SquadMSPermissions;

class PermissionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        /* Permissions */
        foreach (Config::get('sqms-contact.permissions.definitions', []) as $definition => $displayName) {
            SquadMSPermissions::define(Config::get('sqms-contact.permissions.module'), $definition, $displayName);
        }
    }
}
