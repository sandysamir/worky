<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    protected $fillable = [
        'client_id','workspace-id','ratting','review',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
