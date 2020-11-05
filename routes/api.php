<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Service Zone Controller Routes
Route::get('zones', 'API\ServiceZoneController@index');

// Shipping Discount Controller Routes
Route::get('shippingdiscounts', 'API\ShippingDiscountController@index');

// Brand Controller Routes
Route::get('brands', 'API\BrandController@getBrands');
//Route::post('/brands/store', 'API\OrderController@store');

// Category Controller Routes
Route::get('categories', 'API\CategoryController@getCategories');

// Sub-Category Controller Routes
//Route::get('subcategories/category', 'API\SubCategoryController@getSubcategories');
Route::get('categories/subcategory/{id}', 'API\SubcategoryController@getSubcategories');

// Product Controller Routes
Route::get('products', 'API\ProductController@getAllProduct'); //return all product object
Route::get('products/offered', 'API\ProductController@getOfferedProducts'); //return all product object with offer
Route::get('products/featured', 'API\ProductController@getFeaturedProducts'); //return all product object with featured
Route::get('products/popular', 'API\ProductController@getPopularProducts'); //return all product object with popular
Route::get('products/subcategory/{id}', 'API\ProductController@getProductBySubCategory'); //return all product by Subcategory ID
Route::get('products/brand/{id}', 'API\ProductController@getProductByBrand'); //return all product by Brand ID
Route::get('products/search/{string}', 'API\ProductController@getProductBySearchString'); //return all product by Brand ID
Route::get('products/{id}', 'API\ProductController@getSingleProduct');

// Order Controller Routes
Route::get('orders/{status}', 'API\OrderController@index'); //get orders by order status Id
Route::get('orders/show/{id}', 'API\OrderController@show'); //get single order by order Id
Route::post('orders/store', 'API\OrderController@placeOrder');  //insert/place/store order
Route::post('orders/update/{id}', 'API\OrderController@update');  //update order by order Id

// OrderDetail Controller Routes
Route::get('order_details', 'API\OrderDetailController@index');
Route::post('order_details/update/{id}', 'API\OrderDetailController@update');
