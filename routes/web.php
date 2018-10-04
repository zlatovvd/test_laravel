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

Route::resource('employee', 'EmployeeController')->middleware('auth');;

Route::get('shearch' , ['uses'=>'AddController@shearch', 'as'=>'shearch']);

Route::get('sort' , ['uses'=>'AddController@sort', 'as'=>'sort']);

Route::get('position' , ['uses'=>'AddController@position', 'as'=>'position']);

Route::get('tree/{id?}' , ['uses'=>'TreeController@index', 'as'=>'tree'])->middleware('auth');;
