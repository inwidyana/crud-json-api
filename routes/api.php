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

Route::get('/user', 'UserReviewController@index');

Route::post('/user', 'UserReviewController@store');

Route::get('/user/delete/{id}', 'UserReviewController@destroy');

Route::post('/user/update/{id}', 'UserReviewController@update');

Route::get('/user/{id}', 'UserReviewController@show');
