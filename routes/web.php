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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'ingredientsController@sedotData');
//ingredient
Route::get('/ingredients', 'ingredientsController@sedotData');
Route::get('/new-ingredients', function(){
	return view('ingredients.new');
});

Route::get('/logout', 'HomeController@logout');


// Broadwell-23 code...
// User Management
Route::get('/user', 'UserController@index');
Route::post('/user', 'UserController@store');
Route::put('/user', 'UserController@update');
Route::delete('/user', 'UserController@destroy');

// Vendor Management
Route::get('/vendor', 'VendorController@index');
Route::post('/vendor', 'VendorController@store');
Route::put('/vendor', 'VendorController@update');
Route::delete('/vendor', 'VendorController@destroy');