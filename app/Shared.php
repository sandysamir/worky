<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    protected $fillable = [
       'workspace_id','maxIndividual','fees'
    ];

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
        return $this->belongsTo('App\Workspace');
    }
}
