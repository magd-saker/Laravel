<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\OrderApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



    // Products API
    Route::get('products', [ProductApiController::class,'index']);
    // Route::get('/products/{id}', 'ProductsController@show');

    // Orders API
    Route::get('orders', [OrderApiController::class,'index']);
    // Route::get('/orders/{id}', 'OrdersController@show');

    // OrderItems API
    // Route::get('/orderitems', 'OrderItemsController@index');
    // Route::get('/orderitems/{id}', 'OrderItemsController@show');


