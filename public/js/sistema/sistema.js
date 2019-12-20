/* Javascript - Sistema */
    Root = document.querySelector('#Root').getAttribute('url');
    Url = document.querySelector('#Url').getAttribute('url');
    Path = document.querySelector('#Path').getAttribute('url');
    AliasRuta = document.querySelector('#AliasRuta').getAttribute('url');
    Modulo = null;
    data = null;

if (AliasRuta == 'categoria.index')
{
        Modulo = 'Categoría';
        console.info('- Modulo: '+Modulo);
        console.info('- Alias Ruta: '+AliasRuta);

        // DataTable Columnas
        function DataTableColumnas(){
            targets = 4;
            columnas = [
                {data: 'Id'},
                {data: 'Categoria'},
                {data: 'Departamento'},
                {data: 'Descripcion'},
                {data: 'created_at'},
                {data: 'btn'}]
            }
        
        function DatosFormulario(){
            /* Campos Input */
            _categoria = $('#txt_Categoria').val();
            _departamento_select = $('#select_Departamento').val();
            _descripcion = $('#txt_Descripcion').val();

            // Datos del Formulario
            datosFormulario = {
                dep_Id: _departamento_select,
                Categoria: _categoria,
                Descripcion: _descripcion
            }
            
            Datos = datosFormulario;
            return Datos;
        }

        /* Muestra los datos en la Tabla */
        function FilaTabla(datos){
            
            $("#Tabla-Datos > tr").remove();
            var nuevaFila = "<tr><td>" +
            datos[0].Id + "</td><td>" +
            datos[0].Categoria + "</td><td>" +
            datos[0].departamento.Departamento + "</td><td>" +
            moment(datos[0].created_at).format('DD/MM/YYYY') + "</td></tr>";
            $("#Tabla-Datos").append(nuevaFila);
        }

        /* Muestra los Datos */
        function MuestraDatos(datos){
            $('#Id').val(datos[0].Id);
            $('#txt_Categoria').val(datos[0].Categoria);
            $('#txt_Descripcion').val(datos[0].Descripcion);
            $("#select_Departamento").empty(); /* Vacia el Select */
            /* Select Departamentos -
                Obtiene en Array los datos del Select */
            $.getJSON(Root+'/api/departamentos',function(data){
                $.each(data, function(id, valor){
                    $("#select_Departamento")
                    .append('<option value="'+valor.Id+'">'+valor.Departamento+'</option>');
                });
                /* Muestra el registro seleccionado */
                $("#select_Departamento option[value="+ datos[0].dep_Id +"]").attr("selected",true);
            });
        }
    }

    if (AliasRuta == 'departamento.index')
    {
            Modulo = 'Departamento';
            console.info('- Modulo: '+Modulo);
            console.info('- Alias Ruta: '+AliasRuta);

            // DataTable Columnas
            function DataTableColumnas(){
                targets = 3;
                columnas = [{data: 'Id'},
          {data: 'Departamento'},
          {data: 'Descripcion'},
          {data: 'created_at'},
          {data: 'btn'}];
        }
            
            function DatosFormulario(){
                /* Campos Input */
                _departamento = $('#txt_Departamento').val();
                _descripcion = $('#txt_Descripcion').val();
    
                // Datos del Formulario
                datosFormulario = {
                    Departamento: _departamento,
                    Descripcion: _descripcion
                };
                
                Datos = datosFormulario;
                return Datos;
            }
            /* Muestra de Datos */
            function MuestraDatos(datos){
                $('#Id').val(datos.Id);
                $('#txt_Departamento').val(datos.Departamento);
                $('#txt_Descripcion').val(datos.Descripcion);
            }
        }

/* Limpiar Formulario */
function LimpiarFormulario() {
    document.getElementById("Formulario").reset();
}
