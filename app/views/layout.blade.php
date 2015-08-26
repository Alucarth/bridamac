<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Factura Virtual')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Admin lTE -->
    {{ HTML::style('vendor/AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css', array('media' => 'screen')) }}

    {{-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

       {{ HTML::style('vendor/AdminLTE-2.3.0/dist/css/AdminLTE.min.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/iCheck/flat/blue.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/morris/morris.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/datepicker/datepicker3.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker-bs3.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', array('media' => 'screen')) }}
         <!-- DataTables -->
    {{-- <link rel="stylesheet" href="bower_components/AdminLTE-2.3.0/plugins/datatables/dataTables.bootstrap.css"> --}}
    
    {{-- <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> --}}
    {{-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> --}}
    {{-- <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> --}}
    {{-- <link rel="stylesheet" href="plugins/morris/morris.css">  --}}
    {{-- <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> --}}
    {{-- <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> --}}
    {{-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css"> --}}
    {{-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> --}}
    <!-- Bootstrap -->
    {{-- {{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css', array('media' => 'screen')) }} --}}

    {{-- {{ HTML::script('vendor/jquery/dist/jquery.js') }} --}}
    {{-- {{ HTML::script('vendor/bootstrap/dist/js/bootstrap.js') }} --}}

    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

    @yield('head')
  </head>
  <body>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
   {{ HTML::script('vendor/AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') }}
   {{ HTML::script('vendor/AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js') }}
   {{ HTML::script('vendor/AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js') }}
   {{ HTML::script('vendor/AdminLTE-2.3.0/dist/js/app.min.js') }}
   {{ HTML::script('vendor/AdminLTE-2.3.0/dist/js/demo.js') }}
   
    {{ HTML::script('vendor/AdminLTE-2.3.0/plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('vendor/AdminLTE-2.3.0/plugins/datatables/dataTables.bootstrap.min.js') }}
    
    <div id="wrap">
      <div class="container">
        <P></p>
        @yield('body')
      </div>
    </div>


   <!--script src="bower_components/AdminLTE-2.3.0/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="bower_components/AdminLTE-2.3.0/plugins/datatables/dataTables.bootstrap.min.js"></script-->
  <!--script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../plugins/fastclick/fastclick.min.js"></script>
  <script src="../../dist/js/app.min.js"></script>
  <script src="../../dist/js/demo.js"></script-->
  
  </body>
</html>