<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use DataTables;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Path = $request->path(); /* Path */
        $Url = $request->url(); /* URL */
        $NombreRuta = $request->route()->getName(); /* Alias Ruta */

        // DataTables
        if ($request->ajax()) {
            $data = Categoria::latest()->get();

            return datatables::of($data)
        //return datatables()
        //->eloquent(Categoria::query())
        //->addColumn('btn', 'sistema.modulos.categoria.botones', function($row))
        ->addColumn('btn', function($row){

            $btn1 = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-Mostrar" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Mostrar" id="btn-Mostrar" class="btn btn-success btn-sm mr-1">
            <i class="fas fa-eye mr-1"></i>Ver</a>';

            $btn2 = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-default" data-id="'.$row->Id.'" data-original-title="Editar" id="btn-Editar" class="btn btn-warning btn-sm mr-1">
        <i class="fas fa-edit mr-1"></i>Editar</a>';
   
            $btn3 = $btn1.$btn2.'<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Eliminar" id="btn-Eliminar" class="btn btn-danger btn-sm">
           <i class="far fa-trash-alt mr-1"></i>Eliminar</a>';
    
                            return $btn3;
                        })

        ->rawColumns(['btn'])
        ->make(true);
        //->toJson();
    }

        return view('sistema/modulos/categoria/categoria', 
        compact('Path', 'Url', 'NombreRuta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Agregar
        
        $Modelo = Categoria::create($request->all());        
        
        return response()->json(
            ['success'=>'Guardado bien...', $Modelo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $dataCategoria = Categoria::findOrFail($id);
        return view('sistema.modulos.categoria.mostrar', 
            compact('dataCategoria'));
            */
            $Categoria = Categoria::find($id);
            return response()->json($Categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Editar
        $Categoria = Categoria::find($id);
        return response()->json($Categoria); // JSON

        //$editarCategoria = Categoria::find($id);
        //return view('sistema/modulos/categoria/editar', 
            //compact('editarCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualizar
        if ($request->ajax()){
        /*$request->validate([
            'Categoria' => 'required',
        ]);*/

            $Modelo = Categoria::find($id);
            //$Modelo->Categoria = $request->xCategoria;
            //$Modelo->update($request->all());
            //$Modelo = $request->all();
            $Modelo->update(['Categoria' => $request->Categoria]);
            //$Modelo->update();
            return response()->json(
            ['success' => 'El registro se ha actualizado', $Modelo]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar
        $Modelo = Categoria::findOrFail($id);
        $Modelo->delete();
        return response()->json(['success'=>'El registro ha sido borrado.']);
    }
}
