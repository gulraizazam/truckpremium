<?php

use Illuminate\Http\Request;
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
Route::get('/class_factor','API\ApiController@getAllClassFactor');

Route::get('/premium','API\ApiController@getAllpremium');

Route::get('/car_rating_group','API\ApiController@getAllCarRatingGroups');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
