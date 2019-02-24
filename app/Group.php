<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function cars()
    {
        return $this->hasMany('App\Car');
    }
}
