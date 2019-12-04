<!-- Modal -->
<table class="table table-hover" id="Tabla-Mostrar">
    <tr>
        <th>IsD</th>
        <th>Categoría</th>
        <th>Fecha de Creación</th>
    </tr>
    <tr>
        <th>{{ $datos->Id }}</th>
        <th>{{ $datos->Categoria }}</th>
        <th>{{ $datos->created_at }}</th>
    </tr>
</table>

