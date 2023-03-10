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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/index', 'ProductController@showIndex')->name('index');
Route::get('/products/create', 'ProductController@showCreate')->name('create');
Route::post('/products/create', 'ProductController@exeStore')->name('store');
Route::get('/products/detail/{id}', 'ProductController@showDetail')->name('detail');
Route::get('/products/edit/{id}', 'ProductController@showEdit')->name('edit');
Route::post('/products/update', 'ProductController@exeUpdate')->name('update');
Route::post('/products/delete', 'ProductController@exeDestory')->name('destory');

