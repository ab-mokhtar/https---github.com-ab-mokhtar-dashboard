<?php

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\Providers\Auth;

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

Route::get('/fff','firebasecontroller@index');

FacadesAuth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/registre','UserController@user');
    
    Route::post('/newuser','UserController@create');
    Route::post('/newuser','UserController@store');
    Route::put('/user/{id}','UserController@userupdateEtat');
    Route::get('/newuser', function () {
        return view('admin.newuser');
    });
    
    Route::get('/players', 'PlayerController@player');
    Route::get('player/{id}','PlayerController@playerById');
    Route::put('/players/{id}','PlayerController@playerupdateEtat');
    Route::get('/games', 'GameController@index');
    
    
});
Route::group(['middleware' => ['auth','normal']], function(){
    Route::get('/dashboardnor', function () {
        return view('normal.dashboard');
    });
    Route::get('/users','UserController@users');
    Route::get('/playerss', 'PlayerController@playernor');
    
    Route::put('/players/{id}','PlayerController@playerupdateEtat');
    
    Route::get('/gamess', 'GameController@index1');

 });
Route::get('/home', 'HomeController@index')->name('home');
