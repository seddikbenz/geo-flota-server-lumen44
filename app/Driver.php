<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
