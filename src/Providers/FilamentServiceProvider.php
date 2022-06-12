<?php

namespace SquadMS\Contact\Providers;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use SquadMS\Contact\Filament\Resources\ContactMessageResource;

class FilamentServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        ContactMessageResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('sqms-contact');
    }
}
