<?php

namespace SquadMS\Contact;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelPackageTools\Package;
use SquadMS\Contact\Filament\Resources\ContactMessageResource;
use SquadMS\Foundation\Contracts\SquadMSModuleServiceProvider;
use SquadMS\Foundation\Facades\SquadMSPermissions;
use SquadMS\Foundation\Models\SquadMSUser;

class ContactServiceProvider extends SquadMSModuleServiceProvider
{
    public static string $name = 'sqms-contact';

    protected array $resources = [
        ContactMessageResource::class,
    ];

    public function configureModule(Package $package): void
    {
        $package->hasAssets()
                ->hasRoutes(['web']);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function bootedModule(): void
    {
        /* Permissions */
        foreach (Config::get('sqms-contact.permissions.definitions', []) as $definition => $displayName) {
            SquadMSPermissions::define(Config::get('sqms-contact.permissions.module'), $definition, $displayName);
        }

        SquadMSUser::resolveRelationUsing('contactMessages', static function (SquadMSUser $user): HasMany {
            return $user->hasMany(ContactMessage::class);
        });

        SquadMSUser::resolveRelationUsing('claimedContactMessages', static function (SquadMSUser $user): HasMany {
            return $user->hasMany(ContactMessage::class, 'admin_id');
        });

        /* Steam profile URL validator */
        Validator::extend('steam_profile_url', function ($attribute, $value, $parameters, $validator) {
            // https://stackoverflow.com/questions/37016532/check-if-valid-steam-profile-url/63426574#63426574
            return preg_match('/^(?:https?:\/\/)?steamcommunity\.com\/(?:profiles\/[0-9]{17}|id\/[a-zA-Z0-9].*)$/', $value) === 1;
        });
    }
}
