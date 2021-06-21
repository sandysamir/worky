<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Request;
use App\Startup;
class Client extends Model
{
    protected $fillable = [
        'username','email','gender','birthday','payment_method'	

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    public function request()
    {
        return $this->hasOne('App\Request', 'client_id', 'id');
    }
    public function startup()
    {
        return $this->hasOne('App\Startup', 'client_id', 'id');
    }
}
