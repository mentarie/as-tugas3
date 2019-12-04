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

Route::get('/firstpage', function () {
    return view('pagewan');
});

Auth::routes();

Route::group(['middleware'=>['auth']], function(){

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/add', 'DashboardController@add');
    
    Route::get('/kategori', 'KategoriController@index');
    Route::post('/kategori/add','KategoriController@store')->name('kategoriAdd');
    Route::get('/kategori/edit/{id}','KategoriController@edit')->name('kategoriEdit');
    Route::post('/kategori/update','KategoriController@update')->name('kategoriUpdate');
    Route::get('/kategori/delete/{id}','KategoriController@destroy')->name('kategoriDelete');
    Route::get('/add', 'DashboardController@add');
    
    Route::get('/produk', 'ProdukController@index');
    Route::post('/produk/add','ProdukController@store')->name('produkAdd');
    Route::get('/produk/edit/{id}','ProdukController@edit')->name('produkEdit');
    Route::post('/produk/update','ProdukController@update')->name('produkUpdate');
    Route::get('/produk/delete/{id}','ProdukController@destroy')->name('produkDelete');
});





Route::get('/home', 'HomeController@index')->name('home');
