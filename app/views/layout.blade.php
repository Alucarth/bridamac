<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Factura Virtual')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css', array('media' => 'screen')) }}

    {{ HTML::script('vendor/jquery/dist/jquery.js') }}
    {{ HTML::script('vendor/bootstrap/dist/js/bootstrap.js') }}

    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

    @yield('head')
  </head>
  <body>

    <div id="wrap">
      <div class="container">
        <P></p>
        @yield('body')
      </div>
    </div>
  
  </body>
</html>