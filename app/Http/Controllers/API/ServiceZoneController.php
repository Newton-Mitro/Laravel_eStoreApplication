<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ServiceZone;

class ServiceZoneController extends Controller
{

    public function index()
    {
        $service_zones = ServiceZone::join('stores', 'stores.id', '=', 'service_zones.store_id')
            ->select('stores.store_name', 'service_zones.id', 'service_zones.zone_name', 'service_zones.shipping_cost')
            ->orderby('zone_name', 'ASC')->get();
        return response()->json($service_zones, 200);
    }


}
