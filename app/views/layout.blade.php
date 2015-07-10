<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Tutorial Musical')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css', array('media' => 'screen')) }}
    

    {{ HTML::script('vendor/jquery/dist/jquery.js') }}
    {{ HTML::script('vendor/bootstrap/dist/js/bootstrap.js') }}
    
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">    

   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    @yield('head')
  </head>
  <body>
    
    <div id="wrap">
      <div class="container">
        @yield('content')
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('vendor/jquery/dist/jquery.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
  </body>
</html>