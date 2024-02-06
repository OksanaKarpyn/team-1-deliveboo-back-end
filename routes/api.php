<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiTypeController;
use App\Http\Controllers\Api\ApiRestaurantController;
use App\Http\Controllers\Api\ApiDishController;

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

// chiamate Api x frontend
Route::get('/api/types', [ApiTypeController::class, 'index']);
Route::get('/api/restaurants', [ApiRestaurantController::class, 'index']);
Route::get('/api/dishes', [ApiDishController::class, 'index']);