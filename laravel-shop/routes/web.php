<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

    //Category Route
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('category/create',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('category',[App\Http\Controllers\Admin\CategoryController::class,'store']);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
