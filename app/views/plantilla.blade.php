<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Factura Virtual')</title>


    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

    @yield('head')
  </head>
  <body>

    <div id="wrap">
      <div class="container">
        @yield('body')
      </div>
    </div>
  
  </body>
</html>