<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function tracker()
    {
        return $this->belongsTo('App\Tracker');
    }
}
