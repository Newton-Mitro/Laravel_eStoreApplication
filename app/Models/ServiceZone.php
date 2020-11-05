<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceZone extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function shipping_costs()
    {
        return $this->hasMany('App\Models\ShippingCost');
    }
}
