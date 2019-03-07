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
Route::get('/','HomeController@index')->name('index');

Route::get('/replishment','HomeController@replishment')->name('replishment');
Route::post('/sales','SalesController@showSelling')->name('sales');
Route::post('/send','SendController@save')->name('sending');
Route::post('/update-stock','SendController@updateQty')->name('update-stock');
Route::get('/success',function(){
	return view('success');
});

Route::get('/stockin','stockController@index')->name('stockin');
