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

    // VER (Show) ------------------------------------
    $('body').on('click', '#btn-Mostrar', function (e) {
        e.preventDefault();
        var Id = $(this).data('id');

        $.get(Url +'/' + Id, function (data) {
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
            $('#Id-Mostrar').val(data.Id);
            $('#txt_Categoria').val(data.Categoria);
            /* Salida de Datos */
            console.log(data.Id);
            console.log(data.Categoria);
        });
    });

    // EDITAR (Edit) ---------------------------------
    $('body').on('click', '#btn-Editar', function (e) {
        e.preventDefault();
        var Id = $(this).data('id'); // Id
        Status = $("#btn-Guardar").attr("data-original-title", "Editar");
        $('input[name=_method]').val('PUT');
        //console.log(Status);
        //Status = $("#btnGuardar").removeAttr("href");
        
        //$.get("{{ route('sistema/categoria.index') }}" +'/' + product_id +'/edit', function (data) {
        $.get(Url +'/' + Id +'/edit', function (data) {
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
            $('#Id').val(data.Id);
            $('#txt_Categoria').val(data.Categoria);
            /* Salida en Consola */
            console.log(data.Id);
            console.log(data.Categoria);
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
        
        if (Metodo == "Agregar"){
            DatosFormulario(); /* Función Datos Formulario */
            type = "POST"; //for updating existing resource
            my_url = Url;
        }
        if (Metodo == "Editar"){
            DatosFormulario(); /* Función Datos Formulario */
            //console.log('info: '+JSON.stringify(datos));
            type = "PUT"; //for updating existing resource
            my_url += '/' + Id;
        }
        //console.log('Tipo: '+type+' | URL: '+JSON.stringify(datos));
    
        /* Ajax */
        $.ajax({
            data: Datos,
            url: my_url,
            type: type,
            dataType: 'json',
            success: function (data) {   
                console.info(data);
                Tabla.draw();
                toastr.success('Post Updated Successfully.', 'Success Alert', {timeOut: 5000});
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
            icon: 'warning',
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
                            'Borraro!',
                            'Your file has been deleted.',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.error('Error:', data);
                        Swal.fire(
                            'Error!',
                            'Your file has been deleted.',
                            'error'
                        )
                    }
                }); /* Fin Ajax */
            }
        }); /* Fin SweetAlert2 */
    });
});