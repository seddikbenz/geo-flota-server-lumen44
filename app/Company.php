<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cars()
    {
        return $this->hasMany('App\Car');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function drivers()
    {
        return $this->hasMany('App\Driver');
    }
}
