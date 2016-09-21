<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'ProfileController@index');

//Route::get('/users', 'UsersController@index');
//Route::get('users/ban/{user}', 'UsersController@ban');
Route::get('users/ban/{user}', ['uses'=>'UsersController@ban','as'=>'user.ban']);

Route::resource('users', 'UsersController');
