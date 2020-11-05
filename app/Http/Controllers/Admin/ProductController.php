<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderby('created_at','DESC')->get();
        return view('backend.products.read')->with('products',$products);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('backend.products.create')->with('brands',$brands)
            ->with('categories',$categories)
            ->with('subcategories',$subcategories);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'product_image' => 'required',
            'product_long_description' => 'required',
            'tag_price' => 'required',
            'sale_price' => 'required',
        ]);
        $product = Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'A product has been created successfully.');
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.products.view')->with('product',$product);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('backend.products.edit')->with('product',$product)
            ->with('brands',$brands)
            ->with('categories',$categories)
            ->with('subcategories',$subcategories);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->product_image!=null){
            $validatedData = $request->validate([
                'product_name' => 'required|string',
                'product_code' => 'required|string',
                'product_image' => 'required',
                'product_long_description' => 'required',
                'tag_price' => 'required',
                'has_offer' => 'required',
                'product_status' => 'required',
                'featured' => 'required',
            ]);
            $product->subcategory_id = $request->subcategory_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_image = $request->product_image;
            $product->product_long_description = $request->product_long_description;
            $product->tag_price = $request->tag_price;
            $product->sale_price = $request->sale_price;
            $product->has_offer = $request->has_offer;
            $product->featured = $request->featured;
            $product->product_status = $request->product_status;
            $product->save();
            return redirect()->back()->with('success', 'A product has been updated successfully.');
        }else{
            $validatedData = $request->validate([
                'product_name' => 'required|string',
                'product_code' => 'required|string',
                'product_long_description' => 'required',
                'tag_price' => 'required',
                'has_offer' => 'required',
                'product_status' => 'required',
                'featured' => 'required',
            ]);
            $product->subcategory_id = $request->subcategory_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_long_description = $request->product_long_description;
            $product->tag_price = $request->tag_price;
            $product->sale_price = $request->sale_price;
            $product->has_offer = $request->has_offer;
            $product->featured = $request->featured;
            $product->product_status = $request->product_status;
            $product->save();
            return redirect()->back()->with('success', 'A product has been updated successfully.');
        }

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'A product has been deleted successfully.');
    }

    public function updateOffer($id)
    {
        $product = Product::find($id);
        if($product->has_offer==false){
            $product->has_offer = true;
        }else{
            $product->has_offer = false;
        }
        $product->save();
        return redirect()->back()->with('success', 'A product has been updated successfully.');
    }

    public function updateFeature($id)
    {
        $product = Product::find($id);
        if($product->featured==false){
            $product->featured = true;
        }else{
            $product->featured = false;
        }
        $product->save();
        return redirect()->back()->with('success', 'A product has been updated successfully.');
    }

    public function updateStatus($id)
    {
        $product = Product::find($id);
        if($product->product_status==false){
            $product->product_status = true;
        }else{
            $product->product_status = false;
        }
        $product->save();
        return redirect()->back()->with('success', 'A product has been updated successfully.');
    }
}
