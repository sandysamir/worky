<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Booking;
class Checkin extends Model
{
    protected $fillable = [
        'checkin','booking_id'];
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
    protected $hidden = [
            'remember_token',
        ];
    protected $dates = [
        'checkin'];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
