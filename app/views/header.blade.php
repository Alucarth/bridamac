@extends('layout')

@section('head')

  <script src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.js')}} "></script>
  <script src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap-combobox.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout.js/knockout.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/typeahead.js/dist/typeahead.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout-mapping/build/output/knockout.mapping-latest.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout-sortable/build/knockout-sortable.min.js') }}" type="text/javascript"></script>

  <link href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/> 
  <link href="{{ asset('vendor/datatables-bootstrap3/BS3/assets/css/datatables.css') }}" rel="stylesheet" type="text/css">    
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.css')}}">
  <!-- <link href="{{ asset('built.css') }}" rel="stylesheet" type="text/css"/> -->

  <style type="text/css">

    body {
      background-color: #EEEEEE;
      padding-top: 114px;
    }

    @media screen and (min-width: 1200px) {
      body {
        padding-top: 70px;
      }
    }

  </style>

<?php
  HTML::macro('nav_link', function($url, $text, $url2 = '', $extra = '') {
      $class = ( Request::is($url) || Request::is($url.'/*') || Request::is($url2) ) ? ' class="active"' : '';
      $title = ucwords($text);
      return '<li'.$class.'><a href="'.URL::to($url).'" '.$extra.'>'.$title.'</a></li>';
  });

?>
@stop


@section('body')

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo-factura-virtual.png') }}" style="height:25px;margin-top:-5px;width:auto"/>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{ HTML::nav_link('clientes', 'clientes') }}
        {{ HTML::nav_link('productos', 'productos') }}
        {{ HTML::nav_link('facturas', 'facturas') }}
        {{ HTML::nav_link('pagos', 'pagos') }}
        {{ HTML::nav_link('creditos', 'creditos') }}
      </ul>

      <div class="navbar-form navbar-right">

        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="modal" data-target="#proPlanModal">
          {{ Auth::user()->account->getCreditCounter() }}
        </button>

        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
            <span id="myAccountButton">
            </span>
            <span class="glyphicon glyphicon-cog"></span>
          </button>
          <ul class="dropdown-menu fvlink" role="menu">
            <li>{{ link_to('exportar/libro_ventas', 'Exportar Libro Ventas') }}</li>
            <li>{{ link_to('importar/clientes', 'Importar Clientes') }}</li>
            <li>{{ link_to('importar/productos', 'Importar Productos') }}</li>
            <li class="divider"></li>
            <li>{{ link_to('company/chart_builder', 'Graficas/Reportes') }}</li>
            <li class="divider"></li>
            <li>{{ link_to('#', 'Finalizar la sesión', array('onclick'=>'logout()')) }}</li>
          </ul>
        </div>

      </div>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" id="search" class="form-control" placeholder="Búsqueda">
        </div>
      </form>


    </div>
  </div>
</nav>


<br/>
<div class="container">

  @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
  @endif

  @if (Session::has('warning'))
  <div class="alert alert-warning">{{ Session::get('warning') }}</div>
  @endif

  @if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif

  @yield('content')

</div>

  <div class="modal fade" id="proPlanModal" tabindex="-1" role="dialog" aria-labelledby="proPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog medium-dialog">
      <div class="modal-content">
        <div class="modal-header"style="padding-bottom:10px!important;background-color:#016797!important;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="proPlanModalLabel">RECARGAR FACTURAS</h4>
        </div>

        <div style="background-color: #fff; padding-left: 16px; padding-right: 16px" id="proPlanDiv">
                {{ Former::open('account/go_pro')->addClass('proPlanForm') }}

            <div class="row">
              <div class="col-md-12">
                <HR>
                <p>
                Cuenta con {{ Auth::user()->account->getCreditCounter() }} Facturas Disponibles</p>
                <br>

                <div style="display:none">
                  {{ Former::text('path')->value(Request::path()) }}
                  {{ Former::text('go_pro') }}
                </div>
                  {{ Former::text('code')->label('Código') }}
                  {{ Former::close() }}

              </div>
            </div>

      </div>

      <div style="padding-left:40px;padding-right:40px;display:none;min-height:130px" id="proPlanWorking">
        <h3>Trabajando...</h3>
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
      </div>

      <div style="background-color: #fff; padding-right:20px;padding-left:20px; display:none" id="proPlanSuccessR">
        &nbsp;<br/>
        Recarga Exitosa
        <br/>&nbsp;
      </div>
      <div class="modal-footer" style="margin-top: 0px; display:none" id="proPlanErrorR">
              &nbsp;<br/>
        Código Incorrecto
        <br/>&nbsp;
        <div class="modal-footer" style="margin-top: 0px" id="proPlanFooterErrorR">
         <button type="button" class="btn btn-default" id="proPlanButtonR" onclick="reload()" data-dismiss="modal">VOLVER</button>
        </div>
      </div>



       <div class="modal-footer" style="margin-top: 0px" id="proPlanFooterR">
          <button type="button" class="btn btn-default" id="proPlanButtonR" data-dismiss="modal">CERRAR</button>
          <button type="button" class="btn btn-primary" id="proPlanButtonR" onclick="submitProPlan()">ACEPTAR</button>
       </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">


  function logout(force)
  {
    window.location = '{{ URL::to('logout') }}';
  }

  function reload()
  {
    location.reload();
  }

  @if (Auth::check())

    function submitProPlan()
    {

      $('#proPlanDiv, #proPlanFooter').hide();
      $('#proPlanWorking').show();

      $.ajax({
        type: 'POST',
        url: '{{ URL::to('account/go_pro') }}',
        data: 'code=' + encodeURIComponent($('form.proPlanForm #code').val()) +
      '&go_pro=' + $('#go_pro').val(),
        success: function(result) {
          if (result == 'success')
          {
            $('#proPlanSuccessR').show();
            $('#proPlanWorking, #proPlanButton').hide();
            $('#proPlanWorking, #proPlanButton2').hide();
            location.reload();
          }
          else
          {
            $('#proPlanErrorR').show();
            $('#proPlanFooterErrorR').show();
            $('#proPlanWorking').hide();
            $('#proPlanFooterR').hide();
          }

        }
      });
    }

  @endif

  $(function() {
    $('#search').focus(function(){
      if (!window.hasOwnProperty('searchData')) {
        $.get('{{ URL::route('getSearchData') }}', function(data) {
          window.searchData = true;
          var datasets = [];
          for (var type in data)
          {

            var type_new = "";
                if(type.match("Invoices"))
                {
                     type_new="Facturas";
                }
                else
                {
                  if(type.match("Clients"))
                  {
                        type_new="Clientes";
                  }
                  else
                  {
                    if(type.match("Contacts"))
                    {
                          type_new="Contactos";
                    }
                    else
                    {
                      if(type.match("quotes"))
                      {
                            type_new="Recibos";
                      }
                      else
                      {
                        type_new = type;
                      }
                    }
                  }
                }
            if (!data.hasOwnProperty(type)) continue;
            datasets.push({
              name: type,
              header: '&nbsp;<b>' + type_new  + '</b>',
              local: data[type]
            });
          }
          if (datasets.length == 0) {
            return;
          }
          $('#search').typeahead(datasets).on('typeahead:selected', function(element, datum, name) {
            var type = name == 'Contacts' ? 'clients' : name.toLowerCase();
            window.location = '{{ URL::to('/') }}' + '/' + type + '/' + datum.public_id;
          }).focus().typeahead('setQuery', $('#search').val());
        });
      }
    });

    @yield('onReady')

  });

</script>

@stop