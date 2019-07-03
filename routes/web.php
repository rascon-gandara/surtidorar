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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@home')->name("home");

//Rutas para home page
Route::get('home/categorias', 'HomeController@obtenerCategorias')->name('categorias');
Route::post('home/productoscategoria', 'HomeController@obtenerProductosCategoria')->name('ProductosCategoria');
