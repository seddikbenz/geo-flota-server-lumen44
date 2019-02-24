<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function cars()
    {
        return $this->hasMany('App\Car');
    }

    public function drivers()
    {
        return $this->hasMany('App\Driver');
    }
}
