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
Route::group(['namespace' => 'Api'], function () {
    Route::post('/login', 'AuthController@mobileLogin');
    Route::post('/code','AuthController@codeValidation');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('/bucket-list', 'BucketListController');
        Route::resource('/user', 'ProfileController');
        Route::get('/logout', 'AuthController@logout');
        Route::resource('/activity','ActivityController');
        Route::resource('/sub-activity','SubActivityController');
        Route::resource('/travel-destination','TravelDestinationController');
        Route::resource('/package','PackageController');
    });
});
