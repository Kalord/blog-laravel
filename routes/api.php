<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'food'], function() {
    Route::get('/{sex}/{body_weight}', '\App\Http\Controllers\API\FoodController@index');
    Route::get('/{id}', '\App\Http\Controllers\API\FoodController@show');
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', '\App\Http\Controllers\API\PostController@index');
    Route::get('/{id}', '\App\Http\Controllers\API\PostController@show');
    Route::post('/', '\App\Http\Controllers\API\PostController@create');
});
