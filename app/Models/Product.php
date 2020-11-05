<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id','subcategory_id', 'product_image', 'product_name', 'product_code','tag_price', 'sale_price', 'product_long_description', 'has_offer', 'product_status','featured','product_short_description'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
