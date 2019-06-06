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

Route::get('/fund', function () {
    return view('subviews/fund');
});

Route::get('/invest', function () {
    return view('subviews/invest');
});

Route::get('/partner', function () {
    return view('subviews/partner');
});


Auth::routes();

/* named route route('home') routes to HomeController@index*/
Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/purchase', function () {
    //return view('subviews/purchase');
//});

Route::get('/addpurchase', function () {
    return view('subviews/addpurchase');
});

Route::resource('purchases', 'PurchaseController');

Route::get('/postpurchase', 'PurchaseController@store');

/* view purchase should route this ...*/
Route::get('/purchase', 'PurchaseController@index')->name('purchase');

Route::get('/purchasesort/{sortby}', 'PurchaseController@sort');

/*
	$routeMiddleware in kernel.php should have 'localization'defined
	also, $middlewareGroups in kernel.php should have the class in an array.
*/
Route::get('/lang/{locale}', 'LocalizationController@index')->middleware('localization');



