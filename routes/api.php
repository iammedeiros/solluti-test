<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class)->except('create', 'edit')->names([
    'index' => 'product.index',
    'store' => 'product.store',
    'show' => 'product.show',
    'edit' => 'product.edit',
    'destroy' => 'product.destroy'
]);

Route::resource('stores', StoreController::class)->except('create', 'edit')->names([
    'index' => 'store.index',
    'store' => 'store.store',
    'show' => 'store.show',
    'edit' => 'store.edit',
    'destroy' => 'store.destroy'
]);
