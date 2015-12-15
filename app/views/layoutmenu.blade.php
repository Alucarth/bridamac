<html>
  <head>
    <title>@yield('title', 'Factura Virtual')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

     <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">



    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/plugins/datatables/dataTables.bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE2/dist/css/skins/skin-blue.min.css')}}">
    <!-- Admin lTE -->
 
       {{-- {{ HTML::style('vendor/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', array('media' => 'screen')) }} --}}

      {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
       <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> --}}
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
  <body class="hold-transition skin-blue sidebar-mini">
     {{ HTML::script('vendor/AdminLTE2/plugins/jQuery/jQuery-2.1.4.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/bootstrap/js/bootstrap.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/plugins/fastclick/fastclick.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/dist/js/app.min.js') }}
   {{ HTML::script('vendor/AdminLTE2/dist/js/demo.js') }}
   {{ HTML::script('vendor/AdminLTE2/plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('vendor/AdminLTE2/plugins/datatables/dataTables.bootstrap.min.js') }}
 
 <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>F</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Factura </b>Virtual</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
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
             
                  <li class="footer"><a href="#">Cambiar de Sucursal</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              
             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="images/Icon-user.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="images/Icon-user.png" class="img-circle" alt="User Image">
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
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
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

          

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menu Principal</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
            <li><a href="#"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
            <li><a href="#"><i class="fa fa-cube"></i> <span>Productos</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-files-o"></i> <span>Facturas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Factura Normal</a></li>
                <li><a href="#">Factura Recurrente</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-money"></i> <span>Pagos</span></a></li>
            <li><a href="#"><i class="fa fa-credit-card"></i> <span>Creditos</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
           @yield('body')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
           {{Account::find(Auth::user()->account_id)->name}}
        </div>
        <!-- Default to the left -->
        <strong>IpxServer &copy; 2015 <a href="#">Factura Virtual</a>.</strong> Todos los derechos reservados.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
  
  
   
   
  <!--script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../plugins/fastclick/fastclick.min.js"></script>
  <script src="../../dist/js/app.min.js"></script>
  <script src="../../dist/js/demo.js"></script-->
  
  </body>
</html>