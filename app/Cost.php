<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Cost extends Model
{
    protected $fillable = [
        'cost','booking_id'];
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
    protected $hidden = [
            'remember_token',
        ];

        public function booking()
        {
            return $this->hasOne(Booking::class);
        }
        }
