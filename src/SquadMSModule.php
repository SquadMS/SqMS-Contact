<?php

namespace SquadMS\Contact;

use Illuminate\Support\Facades\Artisan;
use SquadMS\Foundation\Modularity\Contracts\SquadMSModule as SquadMSModuleContract;

class SquadMSModule extends SquadMSModuleContract
{
    public static function getIdentifier(): string
    {
        return 'sqms-contact';
    }

    public static function getName(): string
    {
        return 'SquadMS Contact';
    }

    public static function publishAssets(): void
    {
        Artisan::call('vendor:publish', [
            '--provider' => ContactServiceProvider::class,
            '--tag'      => 'assets',
            '--force'    => true,
        ]);
    }
}
