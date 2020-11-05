<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function getSubcategories($id)
    {
        $subcategories = Subcategory::where('category_id',$id)
        ->orderby('subcategory_name','DESC')->get();
        return response()->json($subcategories, 200);
    }
}
