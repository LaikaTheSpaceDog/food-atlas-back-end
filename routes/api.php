<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Countries;
use App\Http\Controllers\API\Users\UserCountries;
use App\Http\Controllers\API\Auth\ApiAuthController;

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

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register',[ApiAuthController::class, 'register'])->name('register.api');
});

Route::middleware('auth:api')->group(function () {
    
    //protected routes

    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');

    Route::group(["prefix" => "countries"], function(){
        Route::get("", [Countries::class, "index"]); // see all countries
        Route::post("", [Countries::class, "store"]); // add a new country
        Route::group(["prefix" => "{country}"], function(){
            Route::get("", [Countries::class, "show"]); // see a specific country
            Route::put("", [Countries::class, "update"]); // update a specific country
            Route::delete("", [Countries::class, "destroy"]); // delete a specific country
        });
    });

    Route::group(["prefix" => "users/{user}/countries"], function(){
        Route::get("", [UserCountries::class, "index"]); // see all countries liked by user
        Route::post("", [UserCountries::class, "store"]); // add new country to user
    });

});
