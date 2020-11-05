<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function order_details()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function service_zone()
    {
        return $this->belongsTo('App\Models\ServiceZone');
    }

    public function shipping_detail()
    {
        return $this->belongsTo('App\Models\ShippingDetail');
    }
}
