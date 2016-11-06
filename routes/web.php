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

//recipe
Route::get('/recipes', 'recipesController@dataResep');
Route::put('/recipes', 'recipesController@ubah');
Route::delete('/recipes', 'recipesController@hapus');
Route::get('/new-recipes', 'recipesController@databaru');



//ingredient
Route::get('/ingredients', 'ingredientsController@sedotData');
Route::put('/ingredients', 'ingredientsController@ubah');
Route::delete('/ingredients', 'ingredientsController@hapus');
Route::get('/new-ingredients', 'ingredientsController@DataIngredients');
Route::post('/new-ingredients', 'ingredientsController@tambah');
Route::get('/new-variants', 'ingredientsController@dataVariants');
Route::post('/new-variants', 'ingredientsController@tambahVariants');


Route::get('/categorys', 'ingredientsController@sedotKategori');
Route::post('/categorys', 'ingredientsController@tambahKategori');
Route::put('/categorys', 'ingredientsController@ubahKategori');
Route::delete('/categorys', 'ingredientsController@hapusKategori');

Route::get('/measurements', 'ingredientsController@sedotSatuan');
Route::post('/measurements', 'ingredientsController@tambahSatuan');
Route::put('/measurements', 'ingredientsController@ubahSatuan');
Route::delete('/measurements', 'ingredientsController@hapusSatuan');


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

// Kapal Management
Route::get('/kapal', 'KapalController@index');
Route::post('/kapal', 'KapalController@store');
Route::put('/kapal', 'KapalController@update');
Route::delete('/kapal', 'KapalController@destroy');

// Penyimpanan Management
Route::get('/penyimpanan', 'PenyimpananController@index');
Route::post('/penyimpanan', 'PenyimpananController@store');
Route::put('/penyimpanan', 'PenyimpananController@update');
Route::delete('/penyimpanan', 'PenyimpananController@destroy');

// Pelabuhan Management
Route::get('/pelabuhan', 'PelabuhanController@index');
Route::post('/pelabuhan', 'PelabuhanController@store');
Route::put('/pelabuhan', 'PelabuhanController@update');
Route::delete('/pelabuhan', 'PelabuhanController@destroy');
// END Broadwell-23 code