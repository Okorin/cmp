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

// Laravel's Auth route scaffolding
Auth::routes();

Route::name('login.')->group(function() {
    Route::get('discord', 'Auth\LoginController@redirectToProvider')->name('discord');
    Route::get('discord/callback', 'Auth\LoginController@handleProviderCallback')->name('discord.callback');
});

Route::get('/home', 'HomeController@index')->name('home');

// Role ressource
Route::name('role.')->group(function () {
    
    // show
	Route::get('/role/{id}',           'RoleController@show')  ->name('view');
	Route::get('/roles',               'RoleController@index') ->name('index');

    // manage view
	Route::get('/roles/create',        'RoleController@create')->name('creationform');
    Route::get('/roles/update/{id}',   'RoleController@edit')  ->name('edit');

    // manage edit
	Route::post('/roles/create',       'RoleController@store') ->name('create');
	Route::post('/roles/update/{id}',  'RoleController@update')->name('update');
	Route::post('/roles/delete/{id}',  'RoleController@delete')->name('delete');
});

// Cycle ressource: do not implement destroy methods, destroying the past makes no sense
Route::name('cycle.')->group(function() {
	
    // show
    Route::get('/cycles',              'CycleController@index') ->name('index');
    Route::get('/cycle/{id}',          'CycleController@show')  ->name('show');

    // manage view
    Route::get('/cycles/create',       'CycleController@create')->name('create');
    Route::get('/cycles/update/{id}',  'CycleController@edit')  ->name('edit');

    // manage edit
    Route::post('/cycles/update/{id}', 'CycleController@update')->name('update');
    Route::post('/cycles/create',      'CycleController@store') ->name('store');
});


Route::name('user.')->group(function() {
    Route::get('/user/{id}',            'UserController@show')->name('show');
});