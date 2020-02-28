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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
Route::get('/home', 'HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category', 'CategoryController@store')->name('category.store');
Route::get('/category/{category_id}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('/category/{category_id}', 'CategoryController@update')->name('category.update');
Route::delete('/category/{category_id}', 'CategoryController@destroy')->name('category.destroy');

Route::get('/category/{category_id}', 'CategoryController@show')->name('category.show');
Route::get('/category/create', 'CategoryController@create')->name('category.create');

Route::resource('product', 'ProductController')->except(['show']); //BAGIAN INI KITA TAMBAHKAN EXCETP KARENA METHOD SHOW TIDAK DIGUNAKAN
Route::get('/product/bulk', 'ProductController@massUploadForm')->name('product.bulk'); //TAMBAHKAN ROUTE INI
Route::post('/product/bulk', 'ProductController@massUpload')->name('product.saveBulk');

    //INI ADALAH ROUTE BARU
    Route::resource('category', 'CategoryController')->except(['create', 'show']);
    Route::resource('product', 'ProductController');
});

