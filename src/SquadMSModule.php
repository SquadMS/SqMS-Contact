<?php

namespace SquadMS\Contact;

use Illuminate\Console\Scheduling\Schedule;
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
        //
    }

    public static function registerMenuEntries(string $menu): void
    {
        //
    }

    public static function schedule(Schedule $schedule): void
    {
        //
    }
}
