<?php

use Illuminate\Support\Facades\Session;
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


Route::group(['middleware' => ['web', 'auth']], function (){

    Route::get('/', 'AdminCtrl@index');
    Route::get('/admin/home', 'AdminCtrl@home');
    Route::resource('user', 'UserCtrl');
    Route::resource('role', 'RoleCtrl');
    Route::resource('group', 'GroupCtrl');
    Route::resource('language', 'LanguageCtrl');
    Route::resource('book', 'BookCtrl');
    Route::resource('organization', 'OrganizationCtrl');
    Route::resource('organizationType', 'OrganizationTypeCtrl');
    Route::resource('category', 'CategoryCtrl');
    Route::get('category/index/{id}', 'CategoryCtrl@index');
    Route::resource('lesson', 'LessonCtrl');
    Route::get('lesson/create/{id}', 'LessonCtrl@create');
    Route::get('lesson/index/{id}', 'LessonCtrl@index');
    Route::resource('exercise', 'ExerciseCtrl');
    Route::get('exercise/index/{id}', 'ExerciseCtrl@index');
    Route::get('exercise/create/{id}', 'ExerciseCtrl@create');
    Route::resource('level', 'LevelCtrl');
    Route::resource('answer', 'AnswerCtrl');
    Route::resource('correction', 'CorrectionCtrl');
    Route::resource('summary', 'SummaryCtrl');
    Route::resource('phrase', 'PhraseCtrl');
    Route::get('phrase/index/{id}', 'PhraseCtrl@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
