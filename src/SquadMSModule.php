<?php

namespace SquadMS\Contact;

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
}
