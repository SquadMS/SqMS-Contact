<?php

namespace SquadMS\Contact\Providers;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use SquadMS\Contact\Filament\Resources\ContactResource;

class FilamentServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        ContactResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('sqms-contact');
    }
}
