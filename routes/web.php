<?php

use App\Http\Middleware\RoleCheck;
use Illuminate\Support\Facades\Route;

Route::get('/sitesetup', function () {
    $dbMigrate = Artisan::call('migrate:refresh');
    echo "Database Migration Complete<br>";

    $dbSeed = Artisan::call('db:seed');
    echo "Database Seed Complete<br>";

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $storageLink = Artisan::call('storage:link');
    echo "Storage Link Created<br>";
});



//Guest user or visitor can access this routes
Route::get('/', function () {
    return view('welcome');
});


//Authenticated user or logged in user can access this route s
Auth::routes();


//User who has role of admin can access this routes
//Create a middleware group for user role check
Route::middleware(['auth', 'site.admin'])->group(function () {
    Route::middleware(['auth', 'super.admin'])->group(function () {
        // User Controller Routes
        Route::get('/users', 'Admin\UserController@index')->name('users.index');
        Route::get('/users/create', 'Admin\UserController@create')->name('user.create');
        Route::get('/users/destroy/{id}', 'Admin\UserController@destroy')->name('user.destroy');
        Route::get('/users/show/{id}', 'Admin\UserController@show')->name('user.show');
        Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
        Route::post('/users/store', 'Admin\UserController@store')->name('user.store');
        Route::post('/users/update/{id}', 'Admin\UserController@update')->name('user.update');

        // Slider controller routes
        Route::get('/sliders', 'Admin\SliderController@index')->name('slider.index');
        Route::get('/sliders/create', 'Admin\SliderController@create')->name('slider.create');
        Route::get('/sliders/destroy/{id}', 'Admin\SliderController@destroy')->name('slider.destroy');
        Route::get('/sliders/show/{id}', 'Admin\SliderController@show')->name('slider.show');
        Route::get('/sliders/edit/{id}', 'Admin\SliderController@edit')->name('slider.edit');
        Route::post('/sliders/store', 'Admin\SliderController@store')->name('slider.store');
        Route::post('/sliders/update/{id}', 'Admin\SliderController@update')->name('slider.update');

        // Settings Controller Routes
        Route::get('/settings', 'Admin\SettingController@index')->name('setting.index');
        Route::post('/settings/update', 'Admin\SettingController@update')->name('setting.update');

        // Store Controller Routes
        Route::get('/stores', 'Admin\StoreController@index')->name('store.index');
        Route::get('/stores/create', 'Admin\StoreController@create')->name('store.create');
        Route::get('/stores/destroy/{id}', 'Admin\StoreController@destroy')->name('store.destroy');
        Route::get('/stores/show/{id}', 'Admin\StoreController@show')->name('store.show');
        Route::get('/stores/edit/{id}', 'Admin\StoreController@edit')->name('store.edit');
        Route::post('/stores/store', 'Admin\StoreController@store')->name('store.store');
        Route::post('/stores/update/{id}', 'Admin\StoreController@update')->name('store.update');

        // Service Zone Controller Routes
        Route::get('/services', 'Admin\ServiceZoneController@index')->name('service.index');
//        Route::get('/services/{id}', 'Admin\ServiceZoneController@getZoneByStore')->name('service.getZones');
        Route::get('/services/create', 'Admin\ServiceZoneController@create')->name('service.create');
        Route::get('/services/destroy/{id}', 'Admin\ServiceZoneController@destroy')->name('service.destroy');
        Route::get('/services/show/{id}', 'Admin\ServiceZoneController@show')->name('service.show');
        Route::get('/services/edit/{id}', 'Admin\ServiceZoneController@edit')->name('service.edit');
        Route::post('/services/store', 'Admin\ServiceZoneController@store')->name('service.store');
        Route::post('/services/update/{id}', 'Admin\ServiceZoneController@update')->name('service.update');

        // Service Zone Controller Routes
        Route::get('/shippingdiscounts', 'Admin\ShippingDiscountController@index')->name('shippingdiscount.index');
        Route::get('/shippingdiscounts/create', 'Admin\ShippingDiscountController@create')->name('shippingdiscount.create');
        Route::get('/shippingdiscounts/destroy/{id}', 'Admin\ShippingDiscountController@destroy')->name('shippingdiscount.destroy');
        Route::get('/shippingdiscounts/show/{id}', 'Admin\ShippingDiscountController@show')->name('shippingdiscount.show');
        Route::get('/shippingdiscounts/edit/{id}', 'Admin\ShippingDiscountController@edit')->name('shippingdiscount.edit');
        Route::post('/shippingdiscounts/store', 'Admin\ShippingDiscountController@store')->name('shippingdiscount.store');
        Route::post('/shippingdiscounts/update/{id}', 'Admin\ShippingDiscountController@update')->name('shippingdiscount.update');

        // Brand Controller Routes
        Route::get('/brands', 'Admin\BrandController@index')->name('brand.index');
        Route::get('/brands/create', 'Admin\BrandController@create')->name('brand.create');
        Route::get('/brands/destroy/{id}', 'Admin\BrandController@destroy')->name('brand.destroy');
        Route::get('/brands/show/{id}', 'Admin\BrandController@show')->name('brand.show');
        Route::get('/brands/edit/{id}', 'Admin\BrandController@edit')->name('brand.edit');
        Route::post('/brands/store', 'Admin\BrandController@store')->name('brand.store');
        Route::post('/brands/update/{id}', 'Admin\BrandController@update')->name('brand.update');

        // Category Controller Routes
        Route::get('/categories', 'Admin\CategoryController@index')->name('category.index');
        Route::get('/categories/create', 'Admin\CategoryController@create')->name('category.create');
        Route::get('/categories/destroy/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');
        Route::get('/categories/show/{id}', 'Admin\CategoryController@show')->name('category.show');
        Route::get('/categories/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
        Route::post('/categories/store', 'Admin\CategoryController@store')->name('category.store');
        Route::post('/categories/update/{id}', 'Admin\CategoryController@update')->name('category.update');

        // Sub-Category Controller Routes
        Route::get('sbucategories', 'Admin\SubCategoryController@index')->name('sub_category.index');
        Route::get('sbucategories/{cat_id}', 'Admin\SubCategoryController@getSubcategoris')->name('sub_category.byCat');
        Route::get('sbucategories/insert/create', 'Admin\SubCategoryController@create')->name('subcategory.create');
        Route::get('sbucategories/destroy/{id}', 'Admin\SubCategoryController@destroy')->name('sub_category.destroy');
        Route::get('sbucategories/show/{id}', 'Admin\SubCategoryController@show')->name('sub_category.show');
        Route::get('sbucategories/edit/{id}', 'Admin\SubCategoryController@edit')->name('sub_category.edit');
        Route::post('sbucategories/store', 'Admin\SubCategoryController@store')->name('sub_category.store');
        Route::post('sbucategories/update/{id}', 'Admin\SubCategoryController@update')->name('sub_category.update');

        // Product Controller Routes
        Route::get('/products', 'Admin\ProductController@index')->name('product.index');
        Route::get('/products/create', 'Admin\ProductController@create')->name('product.create');
        Route::get('/products/destroy/{id}', 'Admin\ProductController@destroy')->name('product.destroy');
        Route::get('/products/show/{id}', 'Admin\ProductController@show')->name('product.show');
        Route::get('/products/edit/{id}', 'Admin\ProductController@edit')->name('product.edit');
        Route::post('/products/store', 'Admin\ProductController@store')->name('product.store');
        Route::post('/products/update/{id}', 'Admin\ProductController@update')->name('product.update');
        Route::get('/products/offer/{id}', 'Admin\ProductController@updateOffer')->name('product.offer.update');
        Route::get('/products/feature/{id}', 'Admin\ProductController@updateFeature')->name('product.feature.update');
        Route::get('/products/status/{id}', 'Admin\ProductController@updateStatus')->name('product.status.update');

        // Order Controller Routes
        Route::get('/orders/{status}', 'Admin\OrderController@index')->name('order.index');
        Route::get('/orders/create', 'Admin\OrderController@create')->name('order.create');
        Route::get('/orders/destroy/{id}', 'Admin\OrderController@destroy')->name('order.destroy');
        Route::get('/orders/show/{id}', 'Admin\OrderController@show')->name('order.show');
        Route::get('/orders/edit/{id}', 'Admin\OrderController@edit')->name('order.edit');
        Route::post('/orders/store', 'Admin\OrderController@store')->name('order.store');
        Route::post('/orders/update/{id}', 'Admin\OrderController@update')->name('order.update');
        Route::get('/report/index', 'Admin\OrderController@filterReport')->name('report.query');
        Route::post('/report/result', 'Admin\OrderController@reportQuery')->name('report.result');

        // OrderDetail Controller Routes
        Route::get('/order_details', 'Admin\OrderDetailController@index')->name('order_detail.index');
        Route::get('/order_details/create', 'Admin\OrderDetailController@create')->name('order_detail.create');
        Route::get('/order_details/destroy/{id}', 'Admin\OrderDetailController@destroy')->name('order_detail.destroy');
        Route::get('/order_details/show/{id}', 'Admin\OrderDetailController@show')->name('order_detail.show');
        Route::get('/order_details/edit/{id}', 'Admin\OrderDetailController@edit')->name('order_detail.edit');
        Route::post('/order_details/store', 'Admin\OrderDetailController@store')->name('order_detail.store');
        Route::post('/order_details/update/{id}', 'Admin\OrderDetailController@update')->name('order_detail.update');

    });

    // User Controllers Routes
    Route::get('/users', 'Admin\UserController@index')->name('users.index');
    Route::get('/users/show/{id}', 'Admin\UserController@show')->name('user.show');

    // Slider controller routes
    Route::get('/sliders', 'Admin\SliderController@index')->name('slider.index');
    Route::get('/sliders/create', 'Admin\SliderController@create')->name('slider.create');
    Route::get('/sliders/show/{id}', 'Admin\SliderController@show')->name('slider.show');
    Route::get('/sliders/edit/{id}', 'Admin\SliderController@edit')->name('slider.edit');
    Route::post('/sliders/store', 'Admin\SliderController@store')->name('slider.store');
    Route::post('/sliders/update/{id}', 'Admin\SliderController@update')->name('slider.update');

    Route::get('/home', 'Admin\DashboardController@home')->name('home');


});

