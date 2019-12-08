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
    return view('page');
});

Route::get('/', 'HomeController@view');
Route::get('/home', function() {
	return redirect('/');
});

Route::get('/product-detail/{alias}/{kode}', 'ProdukDetailController@view');

Route::get('/addtocart/{kode}','CartController@add');