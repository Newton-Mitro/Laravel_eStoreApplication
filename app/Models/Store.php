<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function serviceZones()
    {
        return $this->hasMany('App\Models\ServiceZone');
    }
}
