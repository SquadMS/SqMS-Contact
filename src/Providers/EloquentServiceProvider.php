<?php

namespace SquadMS\Contact\Providers;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use SquadMS\Foundation\Models\SquadMSUser;
use SquadMS\Contact\Models\ContactMessage;

class EloquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        SquadMSUser::resolveRelationUsing('contactMessages', static function (SquadMSUser $user): HasMany {
            return $user->hasMany(ContactMessage::class);
        });

        SquadMSUser::resolveRelationUsing('claimedContactMessages', static function (SquadMSUser $user): HasMany {
            return $user->hasMany(ContactMessage::class, 'admin_id');
        });
    }
}
