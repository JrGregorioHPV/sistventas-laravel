$(document).ready(function (){
  DataTableColumnas();
  console.log('url: '+Url);
    // DataTables
    Tabla = $('#tbl_Contenido').DataTable({
        processing: true,
        serverSide: true,
        ajax: Url, // Dirección URL
        searching: true,
        info: true,
        paging: true,
        ordering: true,
        lengthChange: true,
        autoWidth: false,
        order: [[ 0, "desc" ]], // Id orden Ascendente
        columns: columnas,
        columnDefs: [ {
        targets: targets,
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
  });