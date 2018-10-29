<?php

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

Route::middleware('auth:api')->put('v1/user', 'LoggedUserController@update');
Route::middleware('auth:api')->post('v1/feeding/create', 'FeedingController@store');
