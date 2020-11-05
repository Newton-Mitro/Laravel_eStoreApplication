<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShippingDiscount;
use Illuminate\Http\Request;

class ShippingDiscountController extends Controller
{
    public function index()
    {
        $shipping_discounts = ShippingDiscount::all();

        return response()->json($shipping_discounts, 200);
    }
}
