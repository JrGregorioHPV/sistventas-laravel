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

/* Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

/* Inicio */
Route::get('/', 'InicioController@index')->name('inicio');

/* Sistema - Inicio */
Route::get('/sistema', 'Sistema\InicioController@index')->name('sistema');

/* Sistema -> Categoría */
Route::resource('/sistema/categoria', 'Sistema\CategoriaController');

/* Sistema -> Departamento */
Route::resource('/sistema/departamento', 'Sistema\DepartamentoController');
//Route::get('/sistema/categoria/descargar-categoria', 'Sistema\CategoriaController@excel')->name('categoria.excel');
