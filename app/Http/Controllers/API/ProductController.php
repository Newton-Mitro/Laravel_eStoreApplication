<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProduct()
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getProductBySubCategory($id)
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.subcategory_id', $id)
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getProductByBrand($id)
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.brand_id', $id)
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getProductBySearchString($text)
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.product_name', 'LIKE', '%' . $text . '%')
            ->orwhere('brands.brand_name', 'LIKE', '%' . $text . '%')
            ->orwhere('subcategories.subcategory_name', 'LIKE', '%' . $text . '%')
            ->orwhere('categories.category_name', 'LIKE', '%' . $text . '%')
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getOfferedProducts()
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.has_offer', 1)
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getFeaturedProducts()
    {
        $products = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join) {
                $join->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'subcategories.subcategory_name', 'categories.category_name')
            ->where('products.featured', 1)
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getPopularProducts()
    {
        $products = OrderDetail::distinct('product_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('brands', function ($join) {
                $join->on('brands.id', '=', 'products.brand_id')->select('brands.brand_name');
            })
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories', function ($join1) {
                $join1->on('categories.id', '=', 'subcategories.category_id')->select('categories.category_name');
            })
            ->select('products.*', 'brands.brand_name', 'categories.category_name')
            ->where('products.product_status', 1)->orderby('products.product_name','ASC')->get();
        return response()->json($products, 200);
    }

    public function getSingleProduct($id)
    {
        $product = Product::find($id);
        return response()->json($product, 200);
    }


}
