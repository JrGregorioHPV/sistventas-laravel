<?php

use Illuminate\Http\Request;
use App\Categoria;
use App\Departamento;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Departamento */
Route::get('departamentos', function(){  
    $departamento = Departamento::all();
    return response()->json($departamento);
});

/* Datatables -> Categoría */
Route::get('categorias', function(){
    $categorias = Categoria::all();
    return response()->json($categorias);
});
