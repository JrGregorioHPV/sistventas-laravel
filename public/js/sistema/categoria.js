$(document).ready(function (){
    /* URL */
    var Url = $('#Url').attr('url');
    var Path = $('#Path').attr('url');
    var Modulo = '';

    if(Path == 'sistema/categoria')
    {
      Modulo = 'Categorías'
    }

    // DataTables
    var Tabla = $('#tbl_Categoria').DataTable({
        processing: true,
        serverSide: true,
        ajax: Url,
        searching: true,
        info: true,
        paging: true,
        ordering: true,
        lengthChange: true,
        autoWidth: false,
        columns: [
          {data: 'Id'},
          {data: 'Categoria'},
          {data: 'created_at'},
          {data: 'btn'},
        ],
        columnDefs: [ {
        targets: 2,
        render:function(data){
        return moment(data).format('DD/MM/YYYY');}
      } ],
        language: {
          info: "_TOTAL_ Registro",
          search: "Buscar:",
          paginate: {
            next: "Siguiente",
            previous: "Anterior",
          },
          lengthMenu: 'Mostrar <select>'+
              '<option value="10">10</option>'+
              '<option value="30">30</option>'+
              '<option value="-1">Todos</option>'+
              '</select> registros',
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          emptyTable: "No hay datos",
          zeroRecords: "No hay coincidencias",
          infoEmpty: "",
          infoFiltered: ""
        }
      });
    
    
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

    $('body').on('click', '#Editar', function (e) {
      e.preventDefault();
      var Id = $(this).data('id');
      
      //$.get("{{ route('sistema/categoria.index') }}" +'/' + product_id +'/edit', function (data) {
        $.get(Url +'/' + Id +'/edit', function (data) {
          /* Cabecera Modal  */
          $('.modal-header')
                      .removeClass('')
                      .addClass('bg-warning');
                      $('h4.modal-title').html("Editar "+Modulo);
          /* Botón Cerrar */
          $('#btnCerrar')
                      .html("Cancelar")
                      .removeClass('btn-default')
                      .addClass('btn-danger');
          /* Botón Guardar */
          $('#btnGuardar')
                      .html("Modificar")
                      .removeClass('btn-primary')
                      .addClass('btn-warning');
          $('#txt_Categoria').val(data.Categoria);
          /* Salida de Datos */
          console.log(data.Id);
          console.log(data.Categoria);
          
      });
    });

    /* Eliminar Registro */
    $('body').on('click', '#Eliminar', function () {
      //e.preventDefault();
      var Id = $(this).data('id');

      $.ajax({
        type: 'DELETE',
        url: Url+'/'+Id,
        
        success: function (data) {
          Tabla.ajax.reload();
          console.info('Borrado exitosamente...', data);
          console.info('Id: ', Id);
          console.info('Url: ', Url+'/'+Id);
      },
      error: function (data) {
        console.error('Error:', data);
      }
    });
    });
  });