<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function()
    {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('product-image/{product_image_id}/delete','destroyImage');
        Route::get('/products/{product_id}/delete','destroy');
        
    });

    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
