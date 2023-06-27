<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersItemsController;

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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    //user
    Route::get('/users', [AuthController::class, 'getAllUsers']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    //category
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    //product
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::put('/products/{id}/visibility', [ProductController::class, 'changeVisibility']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    //Orders
    Route::get('/orders/{id}', [OrdersController::class, 'show']);
    Route::get('/orders', [OrdersController::class, 'index']);
    Route::post('/orders', [OrdersController::class, 'store']);

    //OrdersItems
    Route::get('/ordersitems', [OrdersItemsController::class, 'index']);
    Route::get('/{order_id}/ordersitems', [OrdersItemsController::class, 'show']);
    Route::get('/ordersitems/popular', [OrdersItemsController::class, 'popularItems']);
    Route::get('/ordersitems/recommended/{user_id}', [OrdersItemsController::class, 'recommendedItems']);

});
