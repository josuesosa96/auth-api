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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
    Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\Auth\AuthController@user');
    });
});