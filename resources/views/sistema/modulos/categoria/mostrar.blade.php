<input type="hidden" name="_id" id="Id-Mostrar">
<table class="table table-hover" id="Tabla-Mostrar">
    <tr>
        <th>ID</th>
        <th>Categoría</th>
        <th>Fecha de Creación</th>
    </tr>
    <tr>
        <td>{{ $datos->Id }}</td>
        <td>{{ $datos->Categoria }}</td>
        <td>{{ $datos->created_at }}</td>
    </tr>
</table>

