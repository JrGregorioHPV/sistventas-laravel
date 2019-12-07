/* Javascript - Sistema */
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
            targets = 2;
            columnas = [{data: 'Id'},
      {data: 'Categoria'},
      {data: 'created_at'},
      {data: 'btn'}];
    }
        
        function DatosFormulario(){
            /* Campos Input */
            categoria = $('#txt_Categoria').val();

            // Datos del Formulario
            datosFormulario = {
                Categoria: categoria
            };
            
            Datos = datosFormulario;
            return Datos;
        }
        /* Captura de Datos */
        function CapturaDatos(datos){
            $('#Id').val(datos.Id);
            $('#txt_Categoria').val(datos.Categoria);
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
            /* Captura de Datos */
            function CapturaDatos(datos){
                $('#Id').val(datos.Id);
                $('#txt_Departamento').val(datos.Departamento);
                $('#txt_Descripcion').val(datos.Descripcion);
            }
        }

/* Limpiar Formulario */
function LimpiarFormulario() {
    document.getElementById("Formulario").reset();
}
