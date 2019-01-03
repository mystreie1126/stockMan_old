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
Route::get('/','HomeController@index');
Route::post('/sales','SalesController@showSelling')->name('sales');
Route::post('/send','SendController@save');
Route::post('/update-stock','SendController@updateQty');
Route::get('/success',function(){
	return view('success');
});
