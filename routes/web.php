<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! h
|
*/

Route::get('/','HomeController@index')->name('Home');

Route::get('/about', 'HomeController@about')->name('About');

Route::group([
    'prefix'=>'news',
    'as'=>'news.'
    ], function (){
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as'=>'category.'
    ],
        function (){
            Route::get('/categories', 'CategoryController@index')->name('index');
            Route::get('/category/{name}', 'CategoryController@show')->name('show');
        });
});

Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'as'=>'admin.'
], function (){
    Route::get('/','NewsController@index')->name('index');
    Route::match(['get','post'],'/create','NewsController@create')->name('create');
});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
