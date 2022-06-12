<?php

namespace SquadMS\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class RuleArticle extends Model
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
        'admin_id'
    ];
}
