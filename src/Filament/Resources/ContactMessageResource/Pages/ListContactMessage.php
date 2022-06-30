<?php

namespace SquadMS\Contact\Filament\Resources\ContactMessageResource\Pages;

use Filament\Resources\Pages\ListRecords;
use SquadMS\Contact\Filament\Resources\ContactMessageResource;

class ListContactMessage extends ListRecords
{
    protected static string $resource = ContactMessageResource::class;
}
