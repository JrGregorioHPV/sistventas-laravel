/* Javascript - Sistema */
Url = document.querySelector('#Url').getAttribute('url');
Path = document.querySelector('#Path').getAttribute('url');
AliasRuta = document.querySelector('#AliasRuta').getAttribute('url');
Modulo = null;

if (AliasRuta == 'categoria.index')
    {
        Modulo = 'Categoría';
        console.info('- Modulo: '+Modulo);
        console.info('- Alias Ruta: '+AliasRuta);
        
        //console.log('datitos: '+JSON.stringify(datos));
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
    }

/* Limpiar Formulario */
function LimpiarFormulario() {
    document.getElementById("Formulario").reset();
      }