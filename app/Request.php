<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Request extends Model
{
    protected $fillable = [
        'client_id','created_at','description','projectName'
    ];
//esm l cilent 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }
}
