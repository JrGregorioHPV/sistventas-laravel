<input type="hidden" name="_id" id="Id-Mostrar">
<table class="table table-hover" id="Tabla-Mostrar">
<thead>
    <tr>
        <th>ID</th>
        <th>Categoría</th>
        <th>Departamento</th>
        <th>Fecha de Creación</th>
    </tr>
    </thead>
    <tbody id="Tabla-Datos">
    <tr>
        <td>{{ $datos->Id }}</td>
        <td>{{ $datos->Categoria }}</td>
        <td>{{ $datos->departamento->Departamento }}</td>
        <td>{{ $datos->created_at }}</td>
    </tr>
    </tbody>
</table>

