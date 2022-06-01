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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('getIn', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    /*Route::get('logout', 'ApiController@logout');
    Route::get('user','ApiUserController@user');
    Route::get('user/{id}','ApiUserController@userById');
    Route::post('/newuser','ApiUserController@store');
    Route::put('/user/{id}','ApiUserController@userupdateEtat');*/
   

    Route::get('player','PlayerController@playerapi');
    Route::get('player/{id}','PlayerController@playerById');
    Route::post('inscripl','PlayerController@playerSave');
    Route::put('player/{player}','PlayerController@playerUpdate');
    Route::delete('player/{player}','PlayerController@playerDelete');

    Route::get('game','GameController@index');
    Route::get('myscore/{id}','GameController@score');
    Route::get('tri','GameController@tri');
    Route::get('lead','GameController@lead');
    Route::post('addgame','GameController@store');
    //Route::put('player/{player}','PlayerController@playerUpdate');
    //Route::delete('player/{player}','PlayerController@playerDelete');
});
