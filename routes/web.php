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

// Laravel's Auth route scaffolding gets ignored cause no one will have a password or anything else
// cool fact is that restricted users shouldnt be able to use this cause public api doesnt exist
// idk anyone restricted to test this with though but it ""should"" work
//Auth::routes();
// only login methods are bound to osu! -> no more
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'osuAuthController@redirectToProvider')->name('login');
Route::get('/callback', 'osuAuthController@handleProviderCallback');

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

Route::name('checkup.')->group(function() {
    Route::get('/checkups',                         'MenteeCheckupController@index')->name('index');
    Route::get('/checkups/archive',                 'MenteeCheckupController@archive')->name('archive');
    Route::get('/checkup/{menteeCheckup}',          'MenteeCheckupController@show')->name('show');
    Route::get('/checkups/update/{menteeCheckup}',  'MenteeCheckupController@edit')->name('edit');
    Route::get('/checkups/review/{menteeCheckup}',  'MenteeCheckupController@editReview')->name('editReview');

    Route::post('/checkups/create',                 'MenteeCheckupController@store')->name('store');
    Route::post('/checkups/poke/{menteeCheckup}',   'MenteeCheckupController@poke')->name('poke');
    Route::post('/checkups/update/{menteeCheckup}', 'MenteeCheckupController@update')->name('update');
    Route::post('/checkups/review/{menteeCheckup}', 'MenteeCheckupController@review')->name('review');
});
