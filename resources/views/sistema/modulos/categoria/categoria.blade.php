@extends('sistema.plantilla')
@section('Titulo', 'Categoría')
@section('Contenido')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categoría</h1>
            <hr>
            <a href="#" data-original-title="Mostrar" name="POST" id="btn-Agregar" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-1"></i>Agregar Categoría</a>
        
            <a href="#" data-original-title="Mostrar" name="POST" id="btn-Agregar" data-toggle="modal" data-target="#modal-default" class="btn btn-danger">
            <i class="far fa-file-pdf mr-1"></i>PDF</a>

            <a href="#" data-original-title="Mostrar" name="POST" id="btn-Agregar" data-toggle="modal" data-target="#modal-default" class="btn btn-success">
            <i class="far fa-file-excel mr-1"></i>Excel</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categoría</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Contenido Principal -->
<section class="content">
<div class="row">
<div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado de Categorías</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <!-- Tabla Categoría -->
          <table id="tbl_Categoria" class="table table-bordered table-hover table-striped table-sm">
            <thead class="bg-olive">
              <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Fecha de Creación</th>
                <th>&nbsp;Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <br>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      </div>
      <!-- /.row -->
      </section>



<!-- Modal -->
<form role="form" method="POST" id="Formulario" name="Formulario" class="form-horizontal">
<div class="modal fade" id="modal-default">
<input type="hidden" name="_Id" id="Id">
<input type="hidden" name="_method" value="">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            @include('sistema.modulos.categoria.modal')
            {{ csrf_field() }}
            </form>
            </div>
            <div class="modal-footer ">
              <button type="button" id="btn-Cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" id="btn-Guardar" data-original-title="" class="btn btn-primary" data-dismiss="modal"></button>      
            </div> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- Modal Mostrar -->
<div class="modal fade" id="modal-Mostrar">
<input type="hidden" name="_Id" id="Id-Mostrar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            @include('sistema.modulos.categoria.mostrar')
            </div>
            <div class="modal-footer ">
              <button type="submit" id="btn-OK" data-original-title="" class="btn btn-primary" data-dismiss="modal">Save changes</button>          
            </div> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection