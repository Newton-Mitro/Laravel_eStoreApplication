<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceZone;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceZoneController extends Controller
{
    public function index()
    {
        $zones = Servicezone::orderby('zone_name','ASC')->get();
        return view('backend.servicezones.read')->with('servicezones', $zones);
    }

    public function create()
    {
        $stores = Store::all();
        return view('backend.servicezones.create')->with('stores', $stores);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'zone_name' => 'required|string|max:100',
        ]);


        $zone = new Servicezone();
        $zone->zone_name = $request->zone_name;
        $zone->store_id = $request->store_id;
        $zone->shipping_cost = $request->shipping_cost;
        $zone->save();
        return Redirect::back()->with('success','A zone has been created successfully.');
    }

    public function show($id)
    {
        $zone = Servicezone::find($id);
        return view('backend.servicezones.view')->with('zone', $zone);
    }

    public function edit($id)
    {
        $stores = Store::all();
        $zone = Servicezone::find($id);
        return view('backend.servicezones.edit')->with('zone', $zone)->with('stores', $stores);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'zone_name' => 'required|string|max:100',
        ]);

        $zone = Servicezone::find($id);
        $zone->zone_name = $request->zone_name;
        $zone->store_id = $request->store_id;
        $zone->shipping_cost = $request->shipping_cost;
        $zone->save();
        return Redirect::back()->with('success','A zone has been updated successfully.');

    }

    public function destroy($id)
    {
        $zone = Servicezone::find($id);
        $zone->delete();
        return Redirect::back()->with('success','A zone has been deleted successfully.');
    }

//    public function getZoneByStore($id){
//        $servicezones = ServiceZone::where('store_id',$id)->get()->pluck("zone_name","id");
//        return json_encode($servicezones);
//
//    }
}
