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

// cach viet 'prefix'=>'admin' nay se thay viec viet admin/user
Route::group(['prefix'=>'admin'],function (){
    Route::get('user','UserController@index')->name('user.index');
    Route::get('create', 'UserController@create')->name('user.create');
    Route::get('show/{id}', 'UserController@show')->name('user.show');
    Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    Route::delete('delete/{id}', 'UserController@delete')->name('user.delete');
    Route::post('store', 'UserController@store')->name('user.store');



});
Route::get('/home', 'HomeController@index')->name('home');


