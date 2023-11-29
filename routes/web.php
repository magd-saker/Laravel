<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[StaticController::class,'index'] )->name('home.index');
// Route::get('/listproduct',[StaticController::class,'listproduct'] );
Route::resource('products',ProductsController::class);
Route::resource('orders',OrdersController::class);
