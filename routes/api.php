<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api v1
Route::group(['prefix'=> 'v1'],function(){
    Route::apiResource('products',ProductController::class);
    Route::apiResource('genre',GenreController::class);
    Route::apiResource('product',ProductsGenre::class);
});
