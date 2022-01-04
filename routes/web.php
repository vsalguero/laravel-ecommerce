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

Route::resource('products', 'ProductsController');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("in_shopping_carts", "ProductInShoppingCartsController",[
    "only" => ["store", "destroy"]
]);

Route::get('/carrito', 'ShoppingCartController@show')->name('shopping_cart.show');
Route::get('/carrito/products', 'ShoppingCartController@products')->name('shopping_cart.products');
