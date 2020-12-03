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

Route::group(['prefix'=>'month','namespace'=>'Month','as'=>'month.'],function (){
    Route::get('login','IndexController@login')->name('login');
    Route::post('logIng','IndexController@logIng')->name('logIng');

    Route::get('registerIndex','IndexController@registerIndex')->name('registerIndex');
    Route::post('register','IndexController@register')->name('register');
});
