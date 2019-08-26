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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//province
Route::group(['prefix' => '/v1'], function () {
    //provice
    Route::get('/province','ProvinceController@index')->middleware('cors');
    Route::post('/province', 'ProvinceController@store')->middleware('cors');
    //country
    Route::get('/country/{id}','CountryController@show')->middleware('cors');
    Route::post('/country','CountryController@store')->middleware('cors');
    Route::put('/country/{id}', 'CountryController@update')->middleware('cors');
    //store
    Route::get('/store','StoreController@index')->middleware('cors');
    Route::post('/store','StoreController@store')->middleware('cors');
    //room
    Route::get('/room','RoomController@index')->middleware('cors');
    Route::post("/room",'RoomController@store')->middleware('cors');
    //service 
    Route::get('/service','ServiceController@index')->middleware('cors');
    Route::post('/service', 'ServiceController@store')->middleware('cors');
    //booking
    Route::post('/booking','BookingController@store')->middleware('cors');
    Route::put('/booking/{id}','BookingController@update')->middleware('cors');
});
