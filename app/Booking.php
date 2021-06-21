<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Checkin;
use App\Checkout;
class booking extends Model
{
    protected $fillable = [
    'phone','workspace_id','numberOfIndividual','date','payment'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];  
    public function checkin()
    {
        return $this->hasOne(Checkin::class);
    }
    public function checkout()
    {
        return $this->hasOne(Checkout::class);
    }
    public function workspace(){
        return $this->belongsTo('App\Workspace');
    }

}
