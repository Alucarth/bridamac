<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Factura Virtual | {{ isset($title) ? $title : 'Sistema de facturacion virtual' }}</title>    
    <meta name="description" content="{{ isset($description) ? $description : 'Sistema de facturacion virtual acorde a la normativa de impuestos de bolivia.' }}"></meta>

    <meta name="title" content="Facturacion Virtual">
    <meta name="description" content="Sistema de facturacion virtual acorde a la normativa de impuestos de bolivia">
    <meta name="keywords" content="Facturacion Virtual,facturacion,factura,impuestos,bolivia,la paz,cochabamba,santa cruz,oruro,el alto,potosi,beni,pando,tarija,sucre,evo morales,impuestos nacionales,factura virtual,facturacion virtual,iva,it,iue,codigo de control,qr,rnd,sistema de facturacion virtual">
    <meta http-equiv="Content-Language" content="es">
    <meta name="distribution" content="global">
    <meta name="Robots" content="all"/>


    <meta charset="utf-8">
    <meta property="og:site_name" content="Factura Virtual"></meta>
    <meta property="og:url" content="https://cloud.facturavirtual.com.bo"></meta>
    <meta property="og:title" content="Factura Virtual"></meta>
    <meta property="og:description" content="Software de Facturación Online - Su nueva herramienta de gestión financiera"></meta>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,700,900,100' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">    

    

   

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    @yield('head')

  </head>

  <body>

   
    @yield('body')

    
    

  </body>

</html>