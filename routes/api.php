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

Route::middleware('auth:api')->get('/user', 'HomeController@user');

Route::group(['prefix'=>'v1','middleware' => 'auth:api'], function() {
	Route::put('/user', 'LoggedUserController@update');
	Route::post('/feeding/create','FeedingController@store');
});
