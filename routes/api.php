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

//public routes
Route::group(['middleware' => ['cors', 'json.response']], function () {
    
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register',[ApiAuthController::class, 'register'])->name('register.api');

    Route::group(["prefix" => "countries"], function(){
        Route::get("", [Countries::class, "index"]); // see all countries
        Route::group(["prefix" => "{country}"], function(){
            Route::get("", [Countries::class, "show"]); // see a specific country
        });
    });
});

//protected routes
Route::middleware('auth:api')->group(function () {
    
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');

    //admin routes
    Route::group(["prefix" => "countries"], function(){
        Route::post("", [Countries::class, "store"])->middleware('api.admin'); // add a new country
        Route::group(["prefix" => "{country}"], function(){
            Route::put("", [Countries::class, "update"])->middleware('api.admin'); // update a specific country
            Route::delete("", [Countries::class, "destroy"])->middleware('api.admin'); // delete a specific country
        });
    });

    //user specific routes
    Route::group(["prefix" => "me/countries"], function(){
        Route::get("", [UserCountries::class, "index"]); // see all countries liked by user
        Route::post("", [UserCountries::class, "store"]); // add new country to user
    });
});