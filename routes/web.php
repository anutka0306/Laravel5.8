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
    Route::get('/news','NewsController@news')->name('news');
    Route::match(['get','post'],'/create','NewsController@create')->name('create');
    Route::get('/edit{news}','NewsController@edit')->name('edit');
    Route::post('/update{news}','NewsController@update')->name('update');
    Route::get('/destroy{news}','NewsController@destroy')->name('destroy');
    Route::get('/categories','CategoriesController@categories')->name('categories');
    Route::match(['get','post'],'/categories/create','CategoriesController@create')->name('createCategory');
    Route::get('/categories/edit{categories}','CategoriesController@edit')->name('editCategory');
    Route::post('/categories/update{categories}','CategoriesController@update')->name('updateCategory');
    Route::get('/categories/destroy{categories}','CategoriesController@destroy')->name('destroyCategory');
});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
