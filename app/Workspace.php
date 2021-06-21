<?php

namespace App;
use App\User;
use App\Shared;
use App\Booking;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'user_id','images','open_time','close-time','location','WIFI_speed','canteen','logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    public function user(){
        return $this->belongsto(User::class);
    }
    public function booking(){
        return $this->hasMany('App\Booking');
    }
    public function shared(){
        return $this->hasOne('App\Shared');
    }

}
