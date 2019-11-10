<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('Titulo') - AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lib/fontawesome/5.11.2/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('lib/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/AdminLTE/3.0.0/dist/css/adminlte.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/AdminLTE/3.0.0/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('lib/AdminLTE/3.0.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('lib/AdminLTE/3.0.0/plugins/toastr/toastr.min.css') }}">  
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('lib/AdminLTE/3.0.0/dist/css/google-fonts.css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
@include('sistema.navbar')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
@include('sistema.sidebar')
   <!-- /.sidebar -->
   </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield("Contenido")
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    @include("sistema.footer")
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Moment.js -->
<script src="{{ asset('lib/momentjs/2.24.0/moment.js') }}"></script>
<script src="{{ asset('lib/momentjs/2.24.0/moment-with-locales.js') }}"></script>
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/datatables/dataRender/1.10.20/datetime.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lib/AdminLTE/3.0.0/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lib/AdminLTE/3.0.0/dist/js/demo.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('lib/AdminLTE/3.0.0/plugins/toastr/toastr.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('#tbl_Categoria').DataTable({
      "serverSide": true,
      "ajax": "{{ url('api/categorias') }}",
      "searching": true,
      "info": true,
      "paging": true,
      "ordering": true,
      "lengthChange": true,
      "autoWidth": false,
      "columns": [
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
      "language": {
        "info": "_TOTAL_ Registro",
        "search": "Buscar:",
        "paginate": {
          "next": "Siguiente",
          "previous": "Anterior",
        },
        "lengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="30">30</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "emptyTable": "No hay datos",
        "zeroRecords": "No hay coincidencias",
        "infoEmpty": "",
        "infoFiltered": ""
      }
    });



$('#ver').click(function(){
  console.log("OK");
$('#modal-default').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
}); 
});

$('body').on('click', '#Verr', function () {
      var product_id = $(this).data('id');
      $.get("{{ route('categoria.index') }}" +'/' + product_id +'/edit', function (data) {
         // $('#modelHeading').html("Edit Product");
          $('#btnCerrar').text("Cerrar");
          $('#btnGuardar').hide();
          //$('#ajaxModel').modal('show');
          //$('#product_id').val(data.Id);
          $('#Col1').html(data.Id);
          $('#Col2').html(data.Categoria);
          $('#Col3').html(data.created_at);
       

          console.log(data.Id);
          console.log(data.Categoria);
          console.log(data.created_at);


  $('.modal-title').text('Ver Categoria' )

      })
   });
  });
</script>
</body>
</html>
