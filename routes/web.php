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
if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }

Route::get('/', 'FrontController@index')->name('home');

Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('categorie/{id}', 'FrontController@showProductByCat')->where(['id' => '[0-9]+']);

Route::get('solde/{id}', 'FrontController@showProductByCode')->where(['id' => '[0-9]+']);

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/', 'Auth\LoginController@login');

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/categorie', 'CategorieController')->middleware('auth');
Route::resource('admin/product', 'ProductController')->middleware('auth'); 
Auth::routes();