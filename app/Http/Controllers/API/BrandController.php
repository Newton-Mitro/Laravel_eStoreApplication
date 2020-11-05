<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function getBrands()
    {
        $brands = Brand::orderby('brand_name','ASC')->get();
        return response()->json($brands, 200);
    }


}
