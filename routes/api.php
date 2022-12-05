<?php

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

//Route::group(['prefix'=>'v1'],
//    function () {
//        Route::apiResource('airports', \App\Http\Controllers\AirportController::class);
//        Route::apiResource('users', \App\Http\Controllers\UserController::class);
//    });

Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('register', [\App\Http\Controllers\UserController::class, 'store']);
Route::get('airport', [\App\Http\Controllers\AirportController::class, 'search']);
Route::get('user', [\App\Http\Controllers\UserController::class, 'info'])->middleware("auth:api");
Route::get('flight', [\App\Http\Controllers\FlightController::class, 'search']);
//Route::post('booking', [\App\Http\Controllers\BookingController::class, 'store']);
Route::get('booking/{code}', [\App\Http\Controllers\BookingController::class, 'info']);
Route::patch('booking/{code}/seat', [\App\Http\Controllers\BookingController::class, 'update']);
Route::get('booking/{code}/seat', [\App\Http\Controllers\BookingController::class, 'infoSeat']);
Route::get('user/booking', [\App\Http\Controllers\UserController::class, 'bookingsInfo']);

