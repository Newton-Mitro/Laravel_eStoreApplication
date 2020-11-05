<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getCategories()
    {
        $categories = Category::orderby('category_name','ASC')->get();
        return response()->json($categories, 200);
    }

}
