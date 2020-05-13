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

// Destination Routes
Route::get('/destination', 'DestinationController@index')->name('destination.home');
Route::get('/destination_create', 'DestinationController@create')->name('destination.create');
Route::post('/destination_save', 'DestinationController@save')->name('destination.save');