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
Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/', function () {
    return redirect('dashboard');
});
Route::get('/index', function(){
	return redirect('dashboard');
})->middleware('auth');

Route::get('/login','LoginController@login');
Route::post('/login','LoginController@submitlogin');

Route::get('/logout','LoginController@logout');


Route::get('/dashboard','LoginController@toDashboard')->middleware('auth');


//ROUTE MENU
Route::get('/menu','MenuController@view')->middleware('auth');
Route::get('/menu/data','MenuController@data')->middleware('auth');
Route::get('/menu/add','MenuController@add')->middleware('auth');
Route::get('/menu/edit/{id}','MenuController@edit')->middleware('auth');
Route::post('/menu/insert','MenuController@insert')->middleware('auth');
Route::post('/menu/update','MenuController@update')->middleware('auth');
Route::post('/menu/delete','MenuController@delete')->middleware('auth');
//EOF ROUTE MENU

//ROUTE USER
Route::get('/user','UserController@view')->middleware('auth');
Route::get('/user/data','UserController@data')->middleware('auth');
Route::get('/user/add','UserController@add')->middleware('auth');
Route::get('/user/edit/{id}','UserController@edit')->middleware('auth');
Route::post('/user/insert','UserController@insert')->middleware('auth');
Route::post('/user/update','UserController@update')->middleware('auth');
Route::post('/user/delete','UserController@delete')->middleware('auth');
//EOF ROUTE USER

//ROUTE ABOUT US
Route::get('/aboutus','AboutusController@view')->middleware('auth');
//EOF ROUTE ABOUT US

//ROUTE KATproduk
Route::get('/kategoriproduk','katprodukController@view')->middleware('auth');
Route::get('/kategoriproduk/data','katprodukController@data')->middleware('auth');
Route::get('/kategoriproduk/add','katprodukController@add')->middleware('auth');
Route::get('/kategoriproduk/edit/{id}','katprodukController@edit')->middleware('auth');
Route::post('/kategoriproduk/insert','katprodukController@insert')->middleware('auth');
Route::post('/kategoriproduk/update','katprodukController@update')->middleware('auth');
Route::post('/kategoriproduk/delete','katprodukController@delete')->middleware('auth');
//EOF ROUTE KATPRODUK

//ROUTE KATproduk
Route::get('/produk','ProdukController@view')->middleware('auth');
Route::get('/produk/data','ProdukController@data')->middleware('auth');
Route::get('/produk/add','ProdukController@add')->middleware('auth');
Route::get('/produk/edit/{id}','ProdukController@edit')->middleware('auth');
Route::post('/produk/insert','ProdukController@insert')->middleware('auth');
Route::post('/produk/update','ProdukController@update')->middleware('auth');
Route::post('/produk/delete','ProdukController@delete')->middleware('auth');
//EOF ROUTE KATPRODUK

//ROUTE KATproduk
Route::get('/page','PageController@view')->middleware('auth');
Route::get('/page/data','PageController@data')->middleware('auth');
Route::get('/page/add','PageController@add')->middleware('auth');
Route::get('/page/edit/{id}','PageController@edit')->middleware('auth');
Route::post('/page/insert','PageController@insert')->middleware('auth');
Route::post('/page/update','PageController@update')->middleware('auth');
Route::post('/page/delete','PageController@delete')->middleware('auth');
//EOF ROUTE KATPRODUK

//ROUTE ATTRIBUTE
Route::get('/attribute','AttributeController@view')->middleware('auth');
Route::get('/attribute/data','AttributeController@data')->middleware('auth');
Route::get('/attribute/add','AttributeController@add')->middleware('auth');
Route::get('/attribute/edit/{id}','AttributeController@edit')->middleware('auth');
Route::post('/attribute/insert','AttributeController@insert')->middleware('auth');
Route::post('/attribute/update','AttributeController@update')->middleware('auth');
Route::post('/attribute/delete','AttributeController@delete')->middleware('auth');
//EOF ROUTE ATTRIBUTE



