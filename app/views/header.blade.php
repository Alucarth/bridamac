<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Factura Virtual')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Admin lTE -->
    {{ HTML::style('vendor/AdminLTE2/bootstrap/css/bootstrap.min.css', array('media' => 'screen')) }}

    {{-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

       {{ HTML::style('vendor/AdminLTE2/dist/css/AdminLTE.min.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/dist/css/skins/_all-skins.min.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/iCheck/flat/blue.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/morris/morris.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/jvectormap/jquery-jvectormap-1.2.2.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/datepicker/datepicker3.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/daterangepicker/daterangepicker-bs3.css', array('media' => 'screen')) }}
       {{ HTML::style('vendor/AdminLTE2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', array('media' => 'screen')) }}

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
    <!-- JQUERY -->
    {{-- HTML::script('vendor/jquery/dist/jquery.js') --}}
    {{-- {{ HTML::script('vendor/bootstrap/dist/js/bootstrap.js') }} --}}

   {{ HTML::script('vendor/AdminLTE2/plugins/jQuery/jQuery-2.1.4.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/bootstrap/js/bootstrap.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/plugins/fastclick/fastclick.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/dist/js/app.js') }}
   {{ HTML::script('vendor/AdminLTE2/dist/js/demo.js') }}
{{ HTML::script('vendor/AdminLTE2/plugins/datepicker/bootstrap-datepicker.js') }}



    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

      <!--<link rel="stylesheet" href="{{ asset('vendor/DataTables-1.10.7/media/css/jquery.dataTables.min.css')}}">      -->

      <script src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.dataTables.js')}}" type="text/javascript"></script>
      <script src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.js')}}" type="text/javascript"></script>


       <script src="{{ asset('vendor/knockout.js/knockout.js') }}" type="text/javascript"></script>

      <script src="{{ asset('js/Chart.js') }}" type="text/javascript"></script>



      <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/dist/css/skins/skin-blue.min.css')}}">
      <script src="{{ asset('vendor/AdminLTE2/plugins/jQueryUI/jquery-ui.js')}}" type="text/javascript"></script>
      <script src="{{ asset('customs/datepicker.custom.js')}}" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('customs/datepicker.custom.css')}}">
      <script src="{{ asset('customs/bootstrap-switch.js')}}" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('customs/bootstrap-switch.css')}}">


      {{
          HTML::macro('nav_link', function($url, $text, $url2 = '', $extra = '') {
            $class = ( Request::is($url) || Request::is($url.'/*') || Request::is($url2) ) ? ' class="active"' : '';
            $title = ucwords($text);
            return '<li'.$class.'><a href="'.URL::to($url).'" '.$extra.'>';
        });

      }}


       @yield('head')
  </head>
  <body id="logo" class="hold-transition skin-blue-light sidebar-mini">

{{-- Menu David --}}
 <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{asset('images/mini-logo-emizor_06.png')}}"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="{{asset('images/logo-emizor_06.png')}}"></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#"  class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-home"></i>

                  {{Session::get('branch_name')}}

                </a>
                <ul class="dropdown-menu">
                  <li class="header">Factura en {{Session::get('branch_name')}} </li>

                  <li class="footer"><a href="{{URL::to('sucursal')}}">Cambiar de Dosificaci&oacute;n</a></li>
                </ul>
              </li><!-- /.messages-menu -->



              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{asset('images/Icon-user.png')}}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                  <!-- <span class="hidden-xs">{{Account::where('id', Auth::user()->account_id)->select('name')->first()}}</span> -->
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{asset('images/Icon-user.png')}}" class="img-circle" alt="User Image">
                    <p>
                      {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                      <small>{{Auth::user()->is_admin?'Administrador':'Facturador'}} </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    {{-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div> --}}
                    <div class="pull-right">
                      <a href="{{URL::to('logout')}}" class="btn btn-primary btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


          <!-- Sidebar user panel -->
          <div class="user-panel">
            <!-- &nbsp;<img   width="180" height="70" src="data:image/jpg;base64,{{Utils::logoMenu()}}" /> -->
            <div class="pull-left image">
              <img src="{{asset('images/Icon-user.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">

              <p>{{Utils::usuarioText(Auth::user()->username)}}</p>
              <a href="#"> {{Auth::user()->is_admin?'Administrador':'Facturador'}}</a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            {{-- <li class="header"><h3 style="color:black">{{Utils::titulo(Account::find(Auth::user()->account_id)->name)}}</h3></li> --}}
          <li class="header">MENU PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->
             {{ HTML::nav_link('inicio', 'inicio') }}<i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
            {{ HTML::nav_link('clientes', 'clientes') }}<i class="ion-person-stalker"></i> <span>&nbsp&nbsp&nbspClientes</span></a></li>
            <!-- {{ HTML::nav_link('productos', 'productos') }}<i class="fa fa-cube"></i> <span>Productos y Servicios</span></a></li> -->
            <li class="treeview">
              <a href="{{URL::to('productos')}}"><i class="fa fa-cubes"></i> <span>Items</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                {{ HTML::nav_link('productos', 'productos') }}<i class="glyphicon glyphicon-compressed"></i> <span>Productos</span></a></li>
                <!-- {{ HTML::nav_link('producto/createservice', 'servicios') }}<i class="glyphicon glyphicon-briefcase"></i> <span>Servicios</span></a></li> -->
                {{ HTML::nav_link('servicios', 'servicios') }}<i class="glyphicon glyphicon-briefcase"></i> <span>Servicios</span></a></li>
                {{ HTML::nav_link('categorias', 'categorias') }}<i class="fa fa-server"></i> <span>Categorías</span></a></li>
                {{ HTML::nav_link('unidades', 'unidades') }}<i class="fa fa-cube"></i> <span>Unidades</span></a></li>

              </ul>

            </li>

            {{ HTML::nav_link('factura', 'factura') }}<i class="fa fa-files-o"></i> <span>Facturas</span></a></li>

            <li class="treeview">
              <a href="{{URL::to('factura')}}"><i class="fa fa-clipboard"></i> <span> Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!-- {{ HTML::nav_link('factura/create', 'facturas') }}Factura Normal</a></li> -->
                <!-- {{ HTML::nav_link('factura', 'factura') }}<i class="fa fa-file-o"></i> <span>Factura</span></a></li> -->
                {{ HTML::nav_link('importar', 'importar') }}<i class="fa fa-file-excel-o"></i><span>Factura Excel</span></a></li>
                @if(Utils::mostrarNota())
                {{ HTML::nav_link('indexNota', 'facturas') }}<i class="fa fa-file-text-o"></i><span>Nota de Entrega</span></a></li>
                 @endif
                {{-- HTML::nav_link('importar', 'importar') }}Factura Multiple</a></li>--}}
                {{-- <li><a href="#">Factura Recurrente</a></li> --}}
              </ul>
            </li>

             {{ HTML::nav_link('pagos', 'pagos') }}<i class="fa fa-money"></i> <span>Pagos</span></a></li>
             {{ HTML::nav_link('creditos', 'creditos') }}<i class="fa fa-credit-card"></i> <span>Créditos</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


          <h1>
            @yield('encabezado')
            <small>@yield('encabezado_descripcion')</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">

              <!-- <ol class="breadcrumb">
            @yield('nivel')

          </ol> -->
          @if (Session::has('message'))
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  {{ Session::get('message') }}
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endif

            @if (Session::has('error'))
              <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  {{ Session::get('error') }}
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endif
          <!-- Your Page Content Here -->
           @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
           {{Account::find(Auth::user()->account_id)->name}}
        </div>
        <!-- Default to the left -->
        <strong>IpxServer &copy; 2015 <a href="http://emizor.com/">Emizor</a>.</strong> Todos los derechos reservados.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
           @if(Auth::user()->is_admin)
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
           @endif
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h4 class="control-sidebar-heading">{{strtoupper(Account::find(Auth::user()->account_id)->name)}}</h4>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa  fa-file-text-o bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Facturas Emitidas <span class="badge">{{Branch::find(Session::get('branch_id'))->invoice_number_counter-1}}</span></h4>
                    <p>{{Session::get('branch_name')}}</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h4 class="control-sidebar-heading">Fecha Límite de Emisión </h4>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    {{Branch::find(Session::get('branch_id'))->deadline}}
                   {{--  {{ $obj1= new Utils}} --}}
                    <span class="label label-danger pull-right">Expira en {{Utils::calcular_dias()}} día(s)</span>
                  </h4>
                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-danger" style="width: {{Utils::barra_time()}}%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->
            <!--<h4 class="control-sidebar-heading">Tipo de Impresora </h4>-->
            <!--<input id="model_invoice" class="bbb" data-on-text="Normal" labelWidth="20%" data-off-text="Fiscal" type="checkbox" name="my-checkbox" data-label-text="Fiscal" offColor="primary" data-off-color="primary" handleWidth="100" checked>-->


          </div><!-- /.tab-pane -->
          @if(Auth::user()->is_admin)
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->

          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">Opciones Generales</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Administrador

                </label>
                <ul class="sidebar-menu">
                  {{ HTML::nav_link('usuarios', 'usuarios') }}<i class="fa fa-users"></i> <span>Gestión de Usuarios</span></a></li>
                {{ HTML::nav_link('sucursales', 'sucursales') }}<i class="glyphicon glyphicon-home"></i> <span>Activación de Dosificaci&oacute;n</span></a></li>
                </ul>

                 <label class="control-sidebar-subheading">
                  Cuenta

                </label>
                <ul class="sidebar-menu">
                  <li ><a href="{{URL::to('editarcuenta')}}"><i class="fa fa-cog"></i> <span>Configuración de cuenta</span></a></li>
                </ul>

                <label class="control-sidebar-subheading">Generar</label>
                <ul class="sidebar-menu">
                    <li ><a href="{{URL::to('libroVentas')}}"><i class="fa fa-cog"></i> <span>Libro de Ventas</span></a></li>
                  <li ><a data-toggle="modal" data-target="#controlcode"><i class="fa fa-cog"></i> <span>C&oacute;digo de Control</span></a></li>

                </ul>

              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
          @endif
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <div id="controlcode" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Generar C&oacute;digo de Control</h4>
            </div>
            <div class="modal-body">
              <div class="modal-body col-xs-12">
                  <div class="row">
                    <div class="col-md-12">
                        <label>N&uacute;mero de autorizaci&oacute;n</label>
                      <input type="text" id="cc_auth"  class="form-control cc_form" placeholder="Número de autorización" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                        <label>N&uacute;mero de factura</label>
                      <input type="text"id="cc_invo" class="form-control cc_form" placeholder="Número de factura" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>NIT</label>
                      <input type="text" id="cc_nit" class="form-control cc_form" placeholder="NIT" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Fecha</label>
                      <input type="text" id="cc_date" class="form-control cc_form" placeholder="Fecha" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Total</label>
                      <input type="text" id="cc_tota" class="form-control cc_form" placeholder="Total" aria-describedby="sizing-addon2">
                    </div>
                    <div class="col-md-12">
                      <label>Llave</label>
                      <input type="text" id="cc_key" class="form-control cc_form" placeholder="Llave" aria-describedby="sizing-addon2">
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <label>C&oacute;digo Generado</label>
                      <input type="text" id="cc_cc" class="form-control" placeholder="Código Generado" aria-describedby="sizing-addon2">
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="generar" type="button" class="btn btn-primary">Generar</button>
            </div>
          </div>

        </div>
    </div>
  </body>
  <script type="text/javascript">
    $("#model_invoice").bootstrapSwitch();
    $("#model_invoice").on('switchChange.bootstrapSwitch',function(e, data){

        if($("#model_invoice").prop('checked'))      {
            $("#printer_type").val("1");
            $( "#model_invoice" ).siblings(".bootstrap-switch-label").text("Fiscal");
        }
       //     $("#model_invoice.bootstrap-switch-label").text("Fiscal");
        else{
            $("#printer_type").val("0");
            $( "#model_invoice" ).siblings(".bootstrap-switch-label").text("Normal");
        }
            //$("#model_invoice .bootstrap-switch-label").text("Normal");
    });
    window.brian = "hola";
    $(".cc_form").click(function(){
        $(this).select();
    });
    $("#generar").click(function(){
      cc_auth = $("#cc_auth").val();
      cc_invo =  $("#cc_invo").val();
      cc_nit =  $("#cc_nit").val();
      cc_date = $("#cc_date").val();
      cc_tota = $("#cc_tota").val();
      cc_key = encodeURIComponent($("#cc_key").val());
      $.ajax({
            type: 'POST',
            url:'{{ URL::to('controlCode') }}',
            data: 'cc_auth='+cc_auth+'&cc_invo='+cc_invo+'&cc_nit='+cc_nit+'&cc_date='+cc_date+'&cc_tota='+cc_tota+'&cc_key='+cc_key,
            beforeSend: function(){
              console.log("Generando Codigo de Control...");
            },
            success: function(result)
            {
                console.log(result);
                $("#cc_cc").val(result).select();
            }
        });
    });

    // function ocultarLogo(){
    //    var className = $('#logo').attr('class');
    //    console.log(className);
    //   if(className == "skin-blue-light sidebar-mini sidebar-collapse")
    //   {
    //     // console.log('encendido');
    //     $(".user-panel").hide(function(){
    //       $(this).find("img").toggle();
    //     });
    //   }
    //   else {
    //     $(".user-panel").show(function(){
    //       $(this).find("img").toggle();
    //     });
    //   }
    //
    //
    // }
  </script>

</html>
