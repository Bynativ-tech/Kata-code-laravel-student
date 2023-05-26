<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/travel-requests', 'TravelRequestsController@index')->name('TRAVEL_REQUESTS_INDEX');
Route::prefix('/travel-requests')->group(function () {
    Route::prefix('/{commercial_id}')->group(function () {
        Route::match(['get', 'post'], '/', 'TravelRequestsController@show')->name('TRAVEL_REQUESTS_SHOW');
    });
});
