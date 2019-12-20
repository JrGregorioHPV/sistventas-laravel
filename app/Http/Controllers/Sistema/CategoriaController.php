<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Categoria;
use App\Departamento;

class CategoriaController extends Controller
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

        $cat = Categoria::all();
        $dep = Departamento::all();

        // DataTables
        if ($request->ajax()) {
            $categoria = Categoria::latest()->get();
            return datatables::of($categoria)
                ->addColumn('Departamento',function($data_dep){
                    return $data_dep->Departamento->Departamento;})
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
    }
        return view('sistema.modulos.categoria.contenido', 
        compact('Root', 'Url', 'Path', 'Alias', 'cat', 'dep'));
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
        /* Mostrar */
        $Categoria = Categoria::with('departamento')
        ->where('categorias.Id', $id)
        ->get();
            
        return response()->json($Categoria); // JSON
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
        $Categoria = Categoria::with('departamento')
        ->where('categorias.Id', $id)
        ->get();
        return response()->json($Categoria); // JSON
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
            $Modelo->update([
                'dep_Id' => $request->dep_Id,
                'Categoria' => $request->Categoria,
                'Descripcion' => $request->Descripcion]);
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

    public function excel()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        Excel::create('Laravel Excel', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $datos = Categoria::all();                
                $sheet->fromArray($datos);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }
}
