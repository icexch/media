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

Route::post("ads", "AdsController@show");

Route::group(["prefix" => "pixel-point"], function() {
    Route::post("showed", 'PixelPointController@showed');
    Route::post("clicked", 'PixelPointController@clicked');
});