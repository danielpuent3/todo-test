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

Route::get('/', ['as' => 'index', function () {
    return view('welcome');
}]);

Route::group(['prefix' => 'lists'], function () {
    Route::get('/', ['as' => 'lists.index', 'uses' => 'ListsController@index']);
    Route::get('create', ['as' => 'lists.create', 'uses' => 'ListsController@create']);
    Route::post('store', ['as' => 'lists.store', 'uses' => 'ListsController@store']);

});


Route::group(['prefix' => 'auth'], function () {
    // Authentication routes...
    Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

    // Registration routes...
    Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);
});
