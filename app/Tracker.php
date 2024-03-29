<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function positions()
    {
        return $this->hasMany('App\Position');
    }
}
