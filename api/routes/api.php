<?php

use App\User;
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


Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post("/register", "Auth\ApiController@registerUser");

    Route::group(['middleware' => 'auth:api'], function() {

        Route::group(['middleware' => 'script.access'], function(){
            Route::get('/botusers', function (Request $request) {
                $user = User::whereId($request->user()->id)->first();
                return $user->getScripts()->get()->toArray();
            });

            Route::group(['middleware' => 'user.exists'], function(){
                Route::get('/log', "ScriptController@submitLog");
                Route::get('/runtime', "ScriptController@submitRuntime");
                Route::get('/experience', "ScriptController@submitExperience");
                Route::get('/items', "ScriptController@submitItems");
            });

        });

    });


});
