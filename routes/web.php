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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin','middleware' => 'auth'] ,function(){

    Route::get('/products', [
        'uses' => 'ProductsController@index',
        'as' => 'products'
    ]);

    Route::get('/product/create', [ 
        'uses' => 'ProductsController@create',
        'as' => 'product.create'
    ]);

    Route::get('/product/edit/{id}', [
        'uses' => 'ProductsController@edit',
        'as' => 'product.edit'
    ]);

    Route::post('/product/store', [
        'uses' => 'ProductsController@store',
        'as' => 'product.store'
    ]);

    Route::post('/product/delete', [
        'uses' => 'ProductsController@destroy',
        'as' => 'product.delete'
    ]);

    Route::post('/product/update/{id}', [
        'uses' => 'ProductsController@update',
        'as' => 'product.update'
    ]);
    Route::get('/cart',[
        'uses' => 'CartController@cart',
        'as' => 'cart'
    ]);
    Route::post('/cart/add',[
        'uses' => 'CartController@add_to_cart',
        'as' => 'cart.add'
    ]);
    Route::get('/cart/delete/{rowId}',[
        'uses' => 'CartController@cart_delete',
        'as' => 'cart.delete'
    ]);
    Route::get('/cart/decr/{rowId}/{qty}',[
        'uses' => 'CartController@decr',
        'as' => 'cart.decr'
    ]);
    Route::get('/cart/incr/{rowId}/{qty}',[
        'uses' => 'CartController@incr',
        'as' => 'cart.incr'
    ]);

    Route::get('/clients', [
        'uses' => 'ClientsController@index',
        'as' => 'clients'
    ]);

    Route::get('/clients/create', [ 
        'uses' => 'ClientsController@create',
        'as' => 'client.create'
    ]);

    Route::get('/client/edit/{id}', [
        'uses' => 'ClientsController@edit',
        'as' => 'client.edit'
    ]);

    Route::post('/clients/store', [
        'uses' => 'ClientsController@store',
        'as' => 'client.store'
    ]);

    Route::post('/client/delete', [
        'uses' => 'ClientsController@destroy',
        'as' => 'client.delete'
    ]);

    Route::post('/client/update/{id}', [
        'uses' => 'ClientsController@update',
        'as' => 'client.update'
    ]);
});