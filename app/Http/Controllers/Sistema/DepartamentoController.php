<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Departamento;
use App\Categoria;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Root  = $request->root(); /* Root */
        $Url   = $request->url(); /* URL */
        $Path  = $request->path(); /* Path */
        $Alias = $request->route()->getName(); /* Alias Ruta */

        // DataTables
        if ($request->ajax()) {
            $data = Departamento::latest()->get();

            return datatables::of($data)
        ->addColumn('btn', function($row){

            $btn1 = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-Mostrar" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Mostrar" id="btn-Mostrar" class="btn btn-success btn-sm mr-1">
            <i class="fas fa-eye mr-1"></i>Ver</a>';

            $btn2 = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-AgregarEditar" data-id="'.$row->Id.'" data-original-title="Editar" id="btn-Editar" class="btn btn-warning btn-sm mr-1">
        <i class="fas fa-edit mr-1"></i>Editar</a>';
   
            $btn3 = $btn1.$btn2.'<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->Id.'" data-original-title="Eliminar" id="btn-Eliminar" class="btn btn-danger btn-sm">
           <i class="far fa-trash-alt mr-1"></i>Eliminar</a>';
    
                            return $btn3;
                        })

        ->rawColumns(['btn'])
        ->make(true);
        //->toJson();
    }

        return view('sistema.modulos.departamento.contenido', 
        compact('Root', 'Url', 'Path', 'Alias',));
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
        $Modelo = Departamento::create($request->all());        
        
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
        /* Mostrar */
            $datos = Departamento::find($id);
            /*return view('sistema.modulos.departamento.mostrar', 
            compact('datos'));*/
            //$datitos = $datos->categoria;
            return response()->json($datos);
            
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
        $Datos = Departamento::find($id);
        return response()->json($Datos); // JSON
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

            $Modelo = Departamento::find($id);
            $Modelo->update(
                ['Departamento' => $request->Departamento,
                'Descripcion' => $request->Descripcion]
            );
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
        $Modelo = Departamento::findOrFail($id);
        $Modelo->delete();
        return response()->json(['success'=>'El registro ha sido borrado.']);
    }
}
