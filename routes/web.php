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
        Route::post('word/create/json1', 'Admin\WordController@json');

        Route::get('word/edit', 'Admin\WordController@edit');
        Route::post('word/edit', 'Admin\WordController@update');
        Route::get('word/delete', 'Admin\WordController@delete');
        Route::get('word/index', 'Admin\WordController@index');

        Route::get('secondLayer/ITdic','Admin\WordController@second');

        Route::get('word/php_index', 'Admin\WordController@php_index');
        
        Route::get('word/seo_index', 'Admin\WordController@seo_index');

        Route::get('category/dictionary', 'Admin\CategoryController@get_dictionary');
        Route::post('category/dictionary', 'Admin\CategoryController@dictionary');
        Route::get('category/dictionary/delete', 'Admin\CategoryController@dictionary_delete');

        Route::get('category/main_category', 'Admin\CategoryController@get_main_category');
        Route::post('category/main_category', 'Admin\CategoryController@main_category');
        Route::get('category/main_category/delete', 'Admin\CategoryController@main_category_delete');

        Route::get('category/sub_category', 'Admin\CategoryController@get_sub_category');
        Route::post('category/sub_category', 'Admin\CategoryController@sub_category');
        Route::get('category/sub_category_delete', 'Admin\CategoryController@sub_category_delete');
    }
);
Route::get('home', 'Admin\WordController@top');
