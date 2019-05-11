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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
	$routeMiddleware in kernel.php should have 'localization'defined
	also, $middlewareGroups in kernel.php should have the class in an array.
*/
Route::get('/lang/{locale}', 'LocalizationController@index')->middleware('localization');




/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/