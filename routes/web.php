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

// Destination Routes
Route::get('/destination', 'DestinationController@index')->name('destination.home');
Route::get('/destination_create', 'DestinationController@create')->name('destination.create');
Route::post('/destination_save', 'DestinationController@save')->name('destination.save');
Route::get('/destination_edit/{id}', 'DestinationController@edit')->name('destination.edit');
Route::post('/destination_delete', 'DestinationController@delete');

// Employee Routes
Route::get('/employee', 'EmployeeController@index')->name('employee.home');
Route::get('/employee_create', 'EmployeeController@create')->name('employee.create');
Route::post('/employee_save', 'EmployeeController@save')->name('employee.save');
Route::get('/employee_edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/employee_delete', 'EmployeeController@delete');

// Material Routes
Route::get('/material', 'MaterialController@index')->name('material.home');
Route::get('/material_create', 'MaterialController@create')->name('material.create');
Route::post('/material_save', 'MaterialController@save')->name('material.save');
Route::get('/material_edit/{id}', 'MaterialController@edit')->name('material.edit');
Route::post('/material_delete', 'MaterialController@delete')->name('material.delete');

// User Routes
Route::group(['middleware' => ['can:edit users']], function () {
    Route::get('/user', 'UserController@index')->name('user.home');
    Route::get('/user_create', 'UserController@create')->name('user.create');
    Route::get('/user_edit_name/{id}', 'UserController@edit_name')->name('user.edit.name');
    Route::post('/user_save_name', 'UserController@save_name')->name('user.save.name');
    Route::get('/user_edit_email/{id}', 'UserController@edit_email')->name('user.edit.email');
    Route::post('/user_save_email', 'UserController@save_email')->name('user.save.email');
    Route::get('/user_edit_pass/{id}', 'UserController@edit_pass')->name('user.edit.pass');
    Route::post('/user_save_pass', 'UserController@save_pass')->name('user.save.pass');
    Route::get('/user_edit_permission/{id}', 'UserController@edit_permission')->name('user.edit.permission');
    Route::post('/user_save_permission', 'UserController@save_permission')->name('user.save.permission');
    Route::post('/user_delete', 'UserController@delete')->name('user.delete');
});
