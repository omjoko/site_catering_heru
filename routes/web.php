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

Route::get('/home', 'HomeController@index');

//invoice
Route::get('/invoices', 'invoicesController@index');
Route::post('/invoices', 'invoicesController@store');
Route::put('/invoices', 'invoicesController@update');
Route::delete('/invoices', 'invoicesController@destroy');

//menu
Route::get('/menus', 'menusController@sedotDataMenu');
Route::post('/menus', 'menusController@tambah');
Route::put('/menus', 'menusController@ubah');
Route::delete('/menus', 'menusController@hapus');

//recipe
Route::get('/recipes', 'recipesController@dataResep');
Route::put('/recipes', 'recipesController@ubah');
Route::delete('/recipes', 'recipesController@hapus');
Route::get('/new-recipes', function(){return view('recipes.new');	});
Route::post('/new-recipes', 'recipesController@tambah');
Route::get('/new-ingredients-recipe', 'recipesController@dataRecipe');
Route::post('/new-ingredients-recipe', 'recipesController@tambahRecipe');
Route::put('/new-ingredients-recipe', 'recipesController@ubahRecipe');
Route::delete('/new-ingredients-recipe', 'recipesController@hapusRecipe');

//ingredient
Route::get('/ingredients', 'ingredientsController@sedotData');
Route::put('/ingredients', 'ingredientsController@ubah');
Route::delete('/ingredients', 'ingredientsController@hapus');
Route::get('/new-ingredients', 'ingredientsController@DataIngredients');
Route::post('/new-ingredients', 'ingredientsController@tambah');

Route::get('/new-variants', 'ingredientsController@dataVariants');
Route::post('/new-variants', 'ingredientsController@tambahVariants');
Route::put('/new-variants', 'ingredientsController@ubahVariants');
Route::delete('/new-variants', 'ingredientsController@hapusVariants');

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
Route::get('/vendors', 'VendorController@index');
Route::post('/vendors', 'VendorController@store');
Route::put('/vendors', 'VendorController@update');
Route::delete('/vendors', 'VendorController@destroy');

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

// Rute Management
Route::get('/rute', 'RuteController@index');
Route::post('/rute', 'RuteController@store');
Route::put('/rute', 'RuteController@update');
Route::delete('/rute', 'RuteController@destroy');
	Route::get('/transit', 'TransitController@index');
	Route::post('/transit', 'TransitController@store');
	Route::put('/transit', 'TransitController@update');
	Route::delete('/transit', 'TransitController@destroy');

// Sampah Management
Route::get('/waste', 'WasteController@index');
Route::post('/waste', 'WasteController@store');
Route::put('/waste', 'WasteController@update');
Route::delete('/waste', 'WasteController@destroy');
// END Broadwell-23 code