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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
// Home Routes
// Route::get('/home', 'HomeController@index')->name('home');

// Destination Routes
Route::get('/destination', 'DestinationController@index')->name('destination.home');
Route::get('/destination_create', 'DestinationController@create')->name('destination.create');
Route::post('/destination_save', 'DestinationController@save')->name('destination.save');
Route::get('/destination_edit/{id}', 'DestinationController@edit')->name('destination.edit');
Route::post('/destination_delete', 'DestinationController@delete');

// User Routes
Route::group(['middleware' => ['can:edit users']], function () {
    Route::get('/user', 'UserController@index')->name('user.home');
    Route::get('/user_create', 'UserController@create')->name('user.create');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
