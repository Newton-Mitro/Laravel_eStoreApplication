<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::orderby('store_name','ASC')->get();
        return view('backend.stores.read')->with('stores', $stores);
    }

    public function create()
    {
        $stores = Store::all();
        return view('backend.stores.create')->with('stores', $stores);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required|string|max:100',
        ]);


        $store = new Store();
        $store->store_name = $request->store_name;
        $store->save();
        return redirect()->back()->with('success','A store has been created successfully.');
    }

    public function show($id)
    {
        $store = Store::find($id);
        return view('backend.stores.view')->with('store', $store);
    }

    public function edit($id)
    {
        $stores = Store::all();
        $store = Store::find($id);
        return view('backend.stores.edit')->with('store', $store)->with('stores', $stores);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'store_name' => 'required|string|max:100',
        ]);

        $store = Store::find($id);
        $store->store_name = $request->store_name;
        $store->save();
        return redirect()->back()->with('success','A store has been updated successfully.');

    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->back()->with('success','A store has been deleted successfully.');
    }
}
