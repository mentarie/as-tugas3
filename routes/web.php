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


Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@dashboard');

    Route::get('/category', 'CategoryController@index');
    Route::post('/category/add', 'CategoryController@store')->name('categoryAdd');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('categoryEdit');
    Route::post('/category/update', 'CategoryController@update')->name('categoryUpdate');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('categoryDelete');

    Route::get('/article', 'ArticleController@index');
    Route::post('/article/add', 'ArticleController@store')->name('articleAdd');
    Route::get('/article/edit/{id}', 'ArticleController@edit')->name('articleEdit');
    Route::post('/article/update', 'ArticleController@update')->name('articleUpdate');
    Route::get('/article/delete/{id}', 'ArticleController@destroy')->name('articleDelete');
});

Route::get('/{id}', 'HomeController@detail');