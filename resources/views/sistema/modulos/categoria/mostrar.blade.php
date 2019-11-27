<!-- Modal -->
<div class="modal fade" id="modal-ver">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <table class="table table-hover">
    <tr>
        <th>IsD</th>
        <th>Categoría</th>
        <th>Fecha de Creación</th>
    </tr>
    <tr>
        <th>{{ $dataCategoria->Id }}</th>
        <th>{{ $dataCategoria->Categoria }}</th>
        <th>{{ $dataCategoria->created_at }}</th>
    </tr>
</table>

            </div>
            <div class="modal-footer ">
              <button type="button" id="btnCerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btnGuardar" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

