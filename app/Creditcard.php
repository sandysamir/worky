<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditcard extends Model
{
    protected $fillable = [
        'pay_id','client-id','card_name','card_type','card_password','card-id'
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
