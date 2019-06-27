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

Route::get('/invest', function () {
    return view('subviews/invest');
});

Route::get('/partner', function () {
    return view('subviews/partner');
});


Auth::routes();

/* named route route('home') routes to HomeController@index*/

Route::get('/home', 'HomeController@index')->name('home');

/*
    Purchase 
*/

Route::get('/addpurchase', function () {
    return view('subviews/addpurchase');
});

Route::get('/editpurchase', function () {
    return view('subviews/editpurchase');
});

Route::get('/searchedpurchase', function () {
    return view('subviews/searchedpurchase');
});

Route::resource('purchases', 'PurchaseController');

Route::get('/postpurchase', 'PurchaseController@store');

Route::get('/post_editedpurchase', 'PurchaseController@update');

Route::get('/searchpurchase', 'PurchaseController@search');

/* view purchase should route this ... with named route, optional */
Route::get('/purchase', 'PurchaseController@index')->name('purchase');

Route::get('/purchasesort/{sortby}', 'PurchaseController@sort');

Route::get('/purchasedelete/{id}', 'PurchaseController@delete');

Route::get('/purchaseedit/{id}', 'PurchaseController@edit');

/*
    Fund
*/

Route::get('/addfund', function () {
    return view('subviews/addfund');
});

Route::get('/editfund', function () {
    return view('subviews/editfund');
});

Route::get('/searchedfund', function () {
    return view('subviews/searchedfund');
});

Route::resource('funds', 'FundController');

Route::get('/fund', 'FundController@index')->name('fund');

Route::get('/postfund', 'FundController@store');

Route::get('/post_editedfund', 'FundController@update');

Route::get('/searchfund', 'FundController@search');

Route::get('/fundsort/{sortby}', 'FundController@sort');

Route::get('/funddelete/{id}', 'FundController@delete');

Route::get('/fundedit/{id}', 'FundController@edit');


/*
    Laborer
*/

Route::get('/addlabor', function () {
    return view('subviews/addlabor');
});

Route::get('/editlabor', function () {
    return view('subviews/editlabor');
});

Route::get('/searchedlabor', function () {
    return view('subviews/searchedlabor');
});


Route::resource('laborers', 'LaborerController');

Route::get('/labor', 'LaborerController@index')->name('laborer');

Route::get('/postlabor', 'LaborerController@store');

Route::get('/laborsort/{sortby}', 'LaborerController@sort');

Route::get('/post_editedlabor', 'LaborerController@update');

Route::get('/searchlabor', 'LaborerController@search');

Route::get('/labordelete/{id}', 'LaborerController@delete');

Route::get('/laboredit/{id}', 'LaborerController@edit');

/*
	$routeMiddleware in kernel.php should have 'localization'defined
	also, $middlewareGroups in kernel.php should have the class in an array.
*/
Route::get('/lang/{locale}', 'LocalizationController@index')->middleware('localization');



