<?php

use App\Models\User;
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


Route::group(['middleware' => ['cors', 'json.response', 'throttle:100,1']], function () {

    Route::post("/register", "Auth\ApiController@registerUser");
    Route::get('/getItemPrice', "PriceController@getItemPrice");

    Route::group(['middleware' => 'auth:api'], function() {

        Route::group(['middleware' => 'script.access'], function(){
            Route::group(['middleware' => 'user.exists'], function(){
                Route::post('/log', "ScriptController@submitLog");
                Route::post('/runtime', "ScriptController@submitRuntime");
                Route::post('/experience', "ScriptController@submitExperience");
                Route::post('/items', "ScriptController@submitItems");

                Route::get('/getDataByUser', "ScriptController@getDataByUser");
            });
            Route::get('/getDataByScript', "ScriptController@getDataByScript");

        });

    });


});
