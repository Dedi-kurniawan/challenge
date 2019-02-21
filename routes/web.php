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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('produk', 'ProductController');
Route::resource('supplier', 'SupplierController');
Route::get('/', 'CatalogueController@index')->name('katalog.index');
Route::get('f/supplier/produk/{id}', 'CatalogueController@SupplierProduct')->name('f.supplier');
Route::get('f/detail/produk/{id}', 'CatalogueController@DetailProduct')->name('f.detail');

