<?php

namespace SquadMS\Contact\Models;

use Illuminate\Database\Eloquent\Model;
use SquadMS\Foundation\Models\SquadMSUser;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'resolution',
        'admin_id',
        'user_id'
    ];
    
    function user() : BelongsTo
    {
        return $this->belongsTo(SquadMSUser::class);
    }
    
    function admin() : BelongsTo
    {
        return $this->belongsTo(SquadMSUser::class, 'admin_id');
    }

    /**
     * Claims the ContactMessage for an Admin.
     *
     * @param User $user
     * @return void
     */
    function claim(User $user) : void
    {
        $this->admin()->associate($user);
        $this->save();
    }

    /**
     * Resolves and sets the resolution for the ContactMessage
     *
     * @param string $resolution
     * @return void
     */
    function resolve(?string $resolution = '-') : void
    {
        $this->update([
            'resolution' => $resolution,
        ]);
    }
}
