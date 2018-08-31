<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: *');

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


Route::get('get-groups', 'AppClientCtrl@getGroups');
Route::post('get-book', 'AppClientCtrl@getBook');
Route::post('get-exercise', 'AppClientCtrl@getExercise');

Route::post('login', 'AppClientCtrl@login');
Route::post('register', 'AppClientCtrl@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('profile', 'AppClientCtrl@profile');

});