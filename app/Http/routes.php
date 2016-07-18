<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'signin', 'uses' => 'Auth\AuthController@index', 'middleware' => 'guest:web']);
Route::post('auth', ['as' => 'auth.post', 'uses' => 'Auth\AuthController@attempt']);

Route::group(['middleware' => 'auth:web'], function()
{
    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::resource('users', 'UserController', ['except' => ['destroy']]);
    Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);
    Route::get('logout', ['as' => 'user.logout', 'uses' => 'Auth\AuthController@logout']);

});

