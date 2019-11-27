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
<!-- Campos Ocultos -->
<input type="hidden" id="Url" url="{{ $Url }}" />
<input type="hidden" id="Path" url="{{ $Path }}" />
<!-- Categoria Js -->
<script src="{{ asset('js/sistema/categoria.js') }}"></script>

<script>

</script>
</body>
</html>
