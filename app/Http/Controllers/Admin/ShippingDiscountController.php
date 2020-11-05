<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceZone;
use App\Models\ShippingDiscount;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShippingDiscountController extends Controller
{
    public function index()
    {
        $shippingdiscounts = ShippingDiscount::orderby('cart_total','DESC')->get();
        return view('backend.shippingdiscounts.read')->with('shippingdiscounts', $shippingdiscounts);
    }

    public function create()
    {
        return view('backend.shippingdiscounts.create');
    }

    public function store(Request $request)
    {
        $shippingdiscount = new ShippingDiscount();
        $shippingdiscount->cart_total = $request->cart_total;
        $shippingdiscount->discount_amount = $request->discount_amount;
        $shippingdiscount->save();
        return Redirect::back()->with('success','A shipping discount has been created successfully.');
    }

    public function show($id)
    {
        $shippingdiscount = ShippingDiscount::find($id);
        return view('backend.shippingdiscounts.view')->with('shippingdiscount', $shippingdiscount);
    }

    public function edit($id)
    {
        $shippingdiscount = ShippingDiscount::find($id);
        return view('backend.shippingdiscounts.edit')->with('shippingdiscount', $shippingdiscount);
    }

    public function update(Request $request, $id)
    {
        $shippingdiscount = ShippingDiscount::find($id);
        $shippingdiscount->cart_total = $request->cart_total;
        $shippingdiscount->discount_amount = $request->discount_amount;
        $shippingdiscount->save();
        return Redirect::back()->with('success','A shipping discount has been updated successfully.');

    }

    public function destroy($id)
    {
        $shippingdiscount = ShippingDiscount::find($id);
        $shippingdiscount->delete();
        return Redirect::back()->with('success','A shipping discount has been deleted successfully.');
    }
}
