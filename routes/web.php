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

Route::group(['prefix' => 'admin'], function()
    {
        Route::get('word/create', 'Admin\WordController@add');
        Route::post('word/create', 'Admin\WordController@create');
        Route::get('word/edit', 'Admin\WordController@edit');
        Route::post('word/edit', 'Admin\WordController@update');
        Route::get('word/delete', 'Admin\WordController@delete');
        Route::get('word/index', 'Admin\WordController@index');
        Route::get('home', 'Admin\WordController@top');
        Route::get('secondLayer/ITdic','Admin\WordController@second');
        Route::get('word/php_index', 'Admin\WordController@php_index');
    }
);
