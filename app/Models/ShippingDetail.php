<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
}
