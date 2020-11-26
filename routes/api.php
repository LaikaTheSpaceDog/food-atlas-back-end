<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Countries;

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

Route::group(["prefix" => "countries"], function(){
    Route::get("", [Countries::class, "index"]);
    Route::post("", [Countries::class, "store"]);
    Route::group(["prefix" => "{country}"], function(){
        Route::get("", [Countries::class, "show"]);
        Route::put("", [Countries::class, "update"]);
        Route::delete("", [Countries::class, "destroy"]);
    });
});