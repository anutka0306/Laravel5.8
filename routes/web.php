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

Route::match(['get','post'],'/profile', 'ProfileController@update')->name('updateProfile');

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
    'as'=>'admin.',
    'middleware'=>['auth','isAdmin']
], function (){
    Route::get('/parser','ParserController@index')->name('parser');

    Route::get('/resource','ResourceController@index')->name('resource');
    Route::match(['get','post'], '/recourse/create','ResourceController@create')->name('createRecourse');
    Route::get('/recourse/destroy{recourse}','ResourceController@destroy')->name('destroyRecourse');

    Route::match(['get','post'],'/users', 'RolesController@changeUserRole')->name('updateRole');
    Route::resource('/news', 'NewsController')->except('show');
    Route::get('/news/{some}', function(){
        abort(404);
    });

    Route::get('/categories','CategoriesController@categories')->name('categories');
    Route::match(['get','post'],'/categories/create','CategoriesController@create')->name('createCategory');
    Route::get('/categories/edit{categories}','CategoriesController@edit')->name('editCategory');
    Route::post('/categories/update{categories}','CategoriesController@update')->name('updateCategory');
    Route::get('/categories/destroy{categories}','CategoriesController@destroy')->name('destroyCategory');
});


Route::get('vk/auth', 'LoginController@loginVK')->name('vkLogin');
Route::get('vk/auth/response', 'LoginController@responseVK')->name('vkResponse');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
