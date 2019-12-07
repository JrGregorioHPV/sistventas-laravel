/* CRUD AJAX (jQuery) */
$(document).ready(function (){
    /* Ajax Setup */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // AGREGAR (Add) ---------------------------------
    $('#btn-Agregar').click(function () {
        Status = $("#btn-Guardar").attr("data-original-title", "Agregar");
        $('input[name=_method]').val('POST');
        var Metodo1 = $("#btn-Mostrar").attr("data-original-title");
        console.log(Status);
        
        /* Cabecera Modal  */
        $('.modal-header')
            .removeClass('bg-warning bg-success')
            .addClass('bg-primary');
        $('h4.modal-title').html("Registrar "+Modulo);

        /* Botón Cerrar */
        $('#btn-Cerrar')
            .html("Cancelar")
            .removeClass('btn-default')
            .addClass('btn-danger');

        /* Botón Guardar */
        $('#btn-Guardar')
            .html("Guardar")
            .removeClass('btn-warning btn-success')
            .addClass('btn-primary');
            
        $('#Id').val('');
        $('#Formulario').trigger("reset");
    });

    // MOSTRAR (Show) ------------------------------------
    $('body').on('click', '#btn-Mostrar', function (e) {
        e.preventDefault();
        var Id = $(this).data('id');

        $.ajax({
            url: Url +'/' + Id,
            dataType: 'html',
            success: function(response){
                $('#modal-body').html(response);
            }
        });
            /* Cabecera Modal */
            $('.modal-header')
                .removeClass('bg-primary bg-warning bg-danger')
                .addClass('bg-success');
            $('h4.modal-title').html("Mostrar "+Modulo);
            /* Botón OK */
            $('#btn-OK')
                .html("OK")
                .removeClass('btn-primary btn-warning')
                .addClass('btn-success');
            //$('#Id-Mostrar').val(data.Id);
            //$('#txt_Categoria').val(data.Categoria);
    });

    // EDITAR (Edit) ---------------------------------
    $('body').on('click', '#btn-Editar', function (e) {
        e.preventDefault();
        var Id = $(this).data('id'); // Id
        Status = $("#btn-Guardar").attr("data-original-title", "Editar");
        //$('input[name=_method]').val('PUT');

        $.get(Url +'/' + Id +'/edit', function (datos) {
            /* Cabecera Modal  */
            $('.modal-header')
                .removeClass('')
                .addClass('bg-warning');
            $('h4.modal-title').html("Editar "+Modulo);
            /* Botón Cerrar */
            $('#btn-Cerrar')
                .html("Cancelar")
                .removeClass('btn-default')
                .addClass('btn-danger');
            /* Botón Guardar */
            $('#btn-Guardar')
                .html("Modificar")
                .removeClass('btn-primary')
                .addClass('btn-warning');
            /* Captura de Datos */
            /* Salida en Consola */
            CapturaDatos(datos);           
        });
    });

    // GUARDAR (Storage) ---------------------------------
    $('#btn-Guardar').click(function (e) {
        e.preventDefault();
        $(this).html('Guardando...');
        var Id = $("#Id").val();
        var my_url = Url;
        var type = "POST";
        Metodo = $("#btn-Guardar").attr("data-original-title");

        var dataString = $("#Formulario :input[id!='Id'][name!='_method'][name!='_token']").serialize();
        console.log('salida: '+dataString);
        var datas = $("#Formulario").serialize();
        
        if (Metodo == "Agregar"){
            DatosFormulario(); /* Función Datos Formulario */
            type = "POST"; //for updating existing resource
            my_url = Url;
            /* SweetAlert2 */
            var icon = 'success';
            var title = 'Registro Agregado';
            var text = 'El nuevo registro se ha almacenado con éxito!';
            var msjtoastr = 'agregado';
        }
        if (Metodo == "Editar"){
            DatosFormulario(); /* Función Datos Formulario */
            console.log('info: '+JSON.stringify(Datos));
            type = "PUT"; //for updating existing resource
            my_url += '/' + Id;
            /* Mensaje SweetAlert2 */
            var icon = 'success';
            var title = 'Registro Modificado';
            var text = 'El registro se ha modificado satisfactoriamente!';
            /* Mensaje Toastr */
            var msjtoastr = 'actualizado';
        }    
        /* Ajax */
        $.ajax({
            data: Datos,
            url: my_url,
            type: type,
            dataType: 'json',
            success: function (data) {
                Swal.fire({
                    icon: icon,
                    title: title,
                    text: text,
                });
                console.info(data);
                Tabla.draw();
                toastr.success('El registro se ha '+msjtoastr+' con éxito.', 'Perfecto', {timeOut: 5000});
                $('#Formulario').trigger("reset"); /* Limpia Formulario */
            },
            error: function (data) {
                console.error('Error:', data);
                $('#btn-Guardar').html('Save Changes');
                toastr.error('El registro no se ha modificado.', 'Error al Modificar', {timeOut: 5000});
            }
        });
    });

    // ELIMINAR (Delete) ---------------------------------
    $('body').on('click', '#btn-Eliminar', function (e) {
        e.preventDefault();
        var Id = $(this).data('id');

        /* Confirmación de Eliminación */
        Swal.fire({
            title: 'Confirmación de Eliminación',
            text: "¿Desea eliminar este registro?",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar'
        }).then((Resultado) => {
            if (Resultado.value) {
                /* Ajax */
                $.ajax({
                    type: 'DELETE',
                    url: Url+'/'+Id,
                    success: function (data) {
                        Tabla.ajax.reload();
                        console.info('Borrado exitosamente...', data);
                        console.info('Id: ', Id);
                        console.info('Url: ', Url+'/'+Id);
                        Swal.fire(
                            'Borrado!',
                            'El registro se ha eliminado del sistema.',
                            'success'
                        ),
                        toastr.success('Registro eliminado.', 'Perfecto');
                    },
                    error: function (data) {
                        console.error('Error:', data);
                        Swal.fire(
                            'Error!',
                            'El registro no se ha eliminado',
                            'error'
                        ),
                        toastr.error('Verifique su conexión a Internet.', 'Error');
                    }
                }); /* Fin Ajax */
            }
        }); /* Fin SweetAlert2 */
    });
});