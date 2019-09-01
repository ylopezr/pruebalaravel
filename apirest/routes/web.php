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

Route::get('/','UsuariosController@index')->name('index');
Route::get('/show', 'UsuariosController@show')->name('show');
Route::post('/create', 'UsuariosController@create')->name('create');
Route::post('/edit','UsuariosController@edit')->name('edit');
Route::post('/update', 'UsuariosController@update')->name('update');
Route::post('/delete', 'UsuariosController@destroy')->name('delete');
