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

Route::get('/about', function () {
    return view('about');
});

Route::group([
    'prefix'=>'news',
    'as'=>'news.'
    ], function (){
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{id}', 'NewsController@show')->name('show');
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
    Route::get('/','IndexController@index')->name('index');
});



