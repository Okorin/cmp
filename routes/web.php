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

Route::get('/', function () {
    return view('base');
});

Route::get('/register', function () {
	return view('register');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/role/{id}', 'RoleController@show')->name('role.view');
Route::get('/roles/create', 'RoleController@showCreationForm')->name('role.creationform');
Route::post('/roles/create', 'RoleController@create')->name('role.create');
