<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('home','HomeController');

Route::resource('workout','WorkoutController');

Route::resource('training','TrainingController');

Route::resource('graph','GraphController');
Route::get('/createGraph', 'GraphController@createGraph')->name('createGraph');
