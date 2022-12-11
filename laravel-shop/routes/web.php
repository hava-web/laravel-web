<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderControllers;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontentController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[FrontentController::class, 'index']);
Route::get('/collections',[FrontentController::class,'categories']);
Route::get('/collections/{category_slug}',[FrontentController::class,'products']);
Route::get('/collections/{category_slug}/{product_slug}',[FrontentController::class,'productView']);

Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist',[WishlistController::class,'index']);
    Route::get('/cart',[CartController::class,'index']);
    Route::get('/checkout',[CheckoutController::class,'index']);
    Route::get('/orders',[OrderController::class,'index']);
    Route::get('/orders/{orderId}',[OrderController::class,'show']);

});

Route::get('order-success',[FrontentController::class,'orderSuccess']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

    //Category Route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function ()
    {
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });

    Route::controller(ProductController::class)->group(function()
    {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('product-image/{product_image_id}/delete','destroyImage');
        Route::get('/products/{product_id}/delete','destroy');

        Route::post('product-color/{prod_color_id}','updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColor');
        
    });

    Route::controller(SliderController::class)->group(function()
    {
        Route::get('sliders','index');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit','edit');
        Route::put('sliders/{slider}','update');
        Route::get('sliders/{slider}/delete','destroy');

    });

    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(ColorController::class)->group(function()
    {
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors/create','store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete','destroy');
    });

    Route::controller(OrderControllers::class)->group(function()
    {
       Route::get('/orders','index'); 
       Route::get('/orders/{orderId}','show');
       Route::put('/orders/{orderId}','updateOrderStatus');
       Route::get('/invoice/{orderId}','viewInvoice');
       Route::get('/orders/{orderId}/generate','generateInvoice');

    });

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
