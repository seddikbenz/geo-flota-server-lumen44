<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function driver()
    {
        return $this->hasOne('App\Driver');
    }

    public function tracker()
    {
        return $this->hasOne('App\Tracker');
    }
}
