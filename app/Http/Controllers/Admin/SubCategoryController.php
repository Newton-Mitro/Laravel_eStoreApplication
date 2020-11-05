<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategories.read')->with('subcategories', $subcategories);
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategories.create')->with("categories",$categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required|string|max:100',
            'subcategory_image' => 'required',
        ]);
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_image = $request->subcategory_image;
        $subcategory->save();
        return redirect()->back()->with('success', 'A sub-category has been created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategories.edit')->with('subcategory', $subcategory)->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'subcategory_name' => 'required|string|max:100',
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        if ($request->subcategory_image != null) {
            $subcategory->subcategory_image = $request->subcategory_image;
        }
        $subcategory->save();
        return redirect()->back()->with('success', 'A sub-category has been updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'A sub-category has been deleted successfully.');
    }

    public function getSubcategoris($id)
    {
        $subcategories = Subcategory::where('category_id',$id)->get()->pluck("subcategory_name","id");
        return json_encode($subcategories);
    }
}
