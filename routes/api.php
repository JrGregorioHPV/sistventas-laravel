<?php

use Illuminate\Http\Request;

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

/* Datatables -> Categoría */
Route::get('categorias', function(){
    return datatables()
        ->eloquent(App\Categoria::query())
        //->addColumn('btn', 'sistema.modulos.categoria.botones', function($row))
        ->addColumn('btn', function($row){

            $btn1 = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-default" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Verr" id="Verr" class="btn btn-success btn-sm">
            <i class="fas fa-eye mr-1"></i>Ver</a>';

            $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Edit" id="editProduct" class="edit btn btn-primary btn-sm">
        <i class="fas fa-edit  mr-1"></i>Editar</a>';
   
           $btn3 = $btn1.$btn2.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">
           <i class="far fa-trash-alt  mr-1"></i>Eliminar</a>';
    
                            return $btn3;
                        })

        ->rawColumns(['btn'])
        ->toJson();
});
