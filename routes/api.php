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

Route::middleware('auth:api')->get('/profile', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/reset', 'AuthController@forgot');
    Route::resource('/destination-gallery','TravelDestinationGalleryController');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('/user', 'UserController');
        Route::get('/logout', 'AuthController@logout');
        Route::resource('/activity','ActivityController');
        Route::resource('/travel-destination','TravelDestinationController');
        Route::resource('/package','PackageController');
        Route::resource('/sub-activity','SubActivityController');
        Route::resource('/contact-type','ContactTypeController');
        Route::resource('/travel-destination-contact','TravelDestinationContactController');
    });
});
