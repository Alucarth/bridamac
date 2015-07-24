@extends('layout')

@section('head')

  <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout.js/knockout.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout-mapping/build/output/knockout.mapping-latest.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/knockout-sortable/build/knockout-sortable.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/underscore/underscore-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/typeahead.js/dist/typeahead.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/accounting/accounting.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

  <script src="{{ asset('js/bootstrap-combobox.js') }}" type="text/javascript"></script>

  <link href="{{ asset('built.css') }}" rel="stylesheet" type="text/css"/>

  <style type="text/css">

    body {
      background-color: #EEEEEE;
      padding-top: 114px;
    }

    @media screen and (min-width: 1200px) {
      body {
        padding-top: 56px;
      }
    }

  </style>
<script type="text/javascript">

  $.extend( true, $.fn.dataTable.defaults, {
    "sDom": "t<'row-fluid'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "bInfo": true,
    "oLanguage": {
      'sEmptyTable': "{{ trans('texts.empty_table') }}",
      'sLengthMenu': '_MENU_',
      'sSearch': ''
    }
  } );

</script>
@stop

<?php
  HTML::macro('nav_link', function($url, $text, $url2 = '', $extra = '') {
      $class = ( Request::is($url) || Request::is($url.'/*') || Request::is($url2) ) ? ' class="active"' : '';
      $title = ucwords($text);
      return '<li'.$class.'><a href="'.URL::to($url).'" '.$extra.'>'.$title.'</a></li>';
  });

  HTML::macro('menu_link', function($type) {
    $types = $type.'s';
    $Type = ucfirst($type);
    $Types = ucfirst($types);
    $class = ( Request::is($types) || Request::is('*'.$type.'*')) && !Request::is('*advanced_settings*') ? ' active' : '';

    return '<li class="dropdown '.$class.'">
             <a href="'.URL::to($types).'" class="dropdown-toggle">'.$types.'</a>
             <ul class="dropdown-menu" id="menu1">
               <li><a href="'.URL::to($types.'/create').'">'.'Nuevo '.$type.'</a></li>
              </ul>
            </li>';
  });

  HTML::macro('menu_link2', function($type) {
    $types = $type.'s';
    $Type = ucfirst($type);
    $Types = ucfirst($types);
    $class = ( Request::is($types) || Request::is('*'.$type.'*')) && !Request::is('*advanced_settings*') ? ' active' : '';

    return '<li class="dropdown '.$class.'">
             <a href="'.URL::to($types).'" class="dropdown-toggle">'.$types.'</a>
             <ul class="dropdown-menu" id="menu1">
               <li><a href="'.URL::to($types.'/create').'">'.'Nuevo '.$type.'</a></li>
                <li><a href="'.URL::to('/categorias').'">Categorias</a></li>

              </ul>
            </li>';
});

?>

@section('body')

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

  <div class="container">
    <div class="navbar-header">
      <a href="" class='navbar-brand'>
        <img src="{{ asset('images/logo-factura-virtual.png') }}" style="height:25px;margin-top:-5px;width:auto"/>
      </a>
    </div>

    @if (Auth::user()->account->confirmed)

      <div style="font-size:15px; margin:0 ;color:#fff;text-align:right;">

        {{ Auth::user()->getDisplayName() }} |

        @if (Auth::user()->isAdmin())
        <a href="{{ URL::to('/select_branch') }}" style="color:#00B0DC!important;">
          {{-- {{ Auth::user()->getDisplayBranch() }} --}}
          <span style="margin:3px 0" class="glyphicon glyphicon-chevron-down"></span>
        </a>
        @else
        {{ Auth::user()->getDisplayBranch() }}
        <span style="margin:3px 0" class="glyphicon glyphicon-chevron-down"></span>
        @endif

      </div>

    @endif

   </div>

  <div class="container">

    <div class="collapse navbar-collapse" id="navbar-collapse-1">

    @if (Auth::user()->account->confirmed)
      <ul class="nav navbar-nav">

        {{ HTML::nav_link('inicio', 'inicio') }}
        {{ HTML::menu_link('cliente') }}
        {{ HTML::menu_link('factura') }}
        {{ HTML::menu_link('pago') }}
        {{ HTML::menu_link('credito') }}
        {{ HTML::menu_link2('producto') }}

      </ul>
    @endif

      <div class="navbar-form navbar-right">

          @if (!Auth::user()->account->confirmed)

            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="modal" data-target="#proPlanModal2">
            Calcular Código de Control
            </button>

            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="modal" data-target="#PlanModal">
            FINALIZAR CONFIGURACIÓN
            </button>

          @else

            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="modal" data-target="#proPlanModal">
            {{ Auth::user()->account->getCreditCounter() }}
            </button>

          @endif

    @if (Auth::user()->account->confirmed)

        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
            <span id="myAccountButton">
            </span>
            <span class="glyphicon glyphicon-cog"></span>
          </button>
          <ul class="dropdown-menu fvlink" role="menu">
            @if (Auth::user()->isAdmin())
              <li style="font-size:14px;">{{ link_to('company/user_management', 'Gestión de Usuarios') }}</li>
              <li class="divider"></li>

              <li style="font-size:14px;">{{ link_to('company/details', 'Configuración') }}</li>
              <li class="divider"></li>
            @endif

            <li style="font-size:14px;">{{ link_to('exportar/libro_ventas', 'Exportar Libro Ventas') }}</li>
            <li style="font-size:14px;">{{ link_to('importar/clientes', 'Importar Clientes') }}</li>
            <li style="font-size:14px;">{{ link_to('importar/productos', 'Importar Productos') }}</li>


            <li class="divider"></li>

            <li  style="font-size:14px;">{{ link_to('company/chart_builder', 'Graficas/Reportes') }}</li>
            <li class="divider"></li>

            <li class="fvlinkred" style="font-size:14px;">{{ link_to('#', 'Finalizar la sesión', array('onclick'=>'logout()')) }}</li>
          </ul>
        </div>
    @else
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
            <span id="myAccountButton">
            </span>
            <span class="glyphicon glyphicon-cog"></span>
          </button>
          <ul class="dropdown-menu fvlink" role="menu">
          <li class="fvlinkred" style="font-size:14px;">{{ link_to('#', 'Finalizar la sesión', array('onclick'=>'logout()')) }}</li>
          </ul>
        </div>
    @endif

      </div>

@if (Auth::user()->account->confirmed)
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" id="search" class="form-control" placeholder="Búsqueda">
        </div>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a style="line-height: 5px!important" href="#" class="dropdown-toggle" data-toggle="dropdown">Historial<b class="caret"></b></a>
          <ul class="dropdown-menu">
            @if (count(Session::get(RECENTLY_VIEWED)) == 0)
            <li><a href="#">No hay datos disponibles</a></li>
            @else
            @foreach (Session::get(RECENTLY_VIEWED) as $link)
            <?php
                $mystring = $link->name;
                $findme = 'Invoice';
                $new_link = '';
                $pos = strpos($mystring, $findme);
                    if ($pos !== false)
                    {
                      $new_link = substr($link->name, 7);
                      $new_link = 'Factura'.$new_link;

                    }else
                    {
                      $findme = 'Client';
                      $new_link = '';
                      $pos = strpos($mystring, $findme);
                          if ($pos !== false)
                          {
                            $new_link = substr($link->name, 6);
                            $new_link = 'Cliente'.$new_link;
                          }
                          else
                          {
                            $findme = 'Quote';
                            $new_link = '';
                            $pos = strpos($mystring, $findme);
                                if ($pos !== false)
                                {
                                  $new_link = substr($link->name, 6);
                                  $new_link = 'Recibo'.$new_link;
                                }
                                else
                                {
                                    $link->name = $new_link;
                                }
                          }
                    }
                ?>
            <li><a href="{{ $link->url }}">{{ $new_link }}</a></li>
            @endforeach
            @endif
          </ul>
        </li>
      </ul>
@endif

    </div>


  </div>
</nav>



<br/>
<div class="container">

  @if (Session::has('warning'))
  <div class="alert alert-warning">{{ Session::get('warning') }}</div>
  @endif

  @if (Session::has('message'))
    <div class="alert alert-info">
      {{ Session::get('message') }}
    </div>
  @elseif (Session::has('news_feed_message'))
    <div class="alert alert-info">
      {{ Session::get('news_feed_message') }}
      <a href="#" onclick="hideMessage()" class="pull-right">Ocultar</a>
    </div>
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




@if (Auth::check() && !Auth::user()->isPro())
  <div class="modal fade" id="PlanModal" tabindex="-1" role="dialog" aria-labelledby="PlanModalLabel" aria-hidden="true">
    <div class="modal-dialog medium-dialog">
      <div class="modal-content">
        <div class="modal-header"style="padding-bottom:10px!important;background-color:#016797!important;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="PlanModalLabel">FINALIZAR CONFIGURACIÓN</h4>
        </div>

        <div style="background-color: #fff; padding-left: 16px; padding-right: 16px" id="proPlanDiv">

            <div class="row">
              <div class="col-md-12">
                <HR>
                <p>Para configurar tu cuenta, requieres los datos del Padrón Biométrico Digital del NIT, tener habilitada la modalidad de Facturación Computarizada, obtener la  llave de dosificación y el Logo de tu empresa.</p>
                <br>
                <ul class="list-group">

                  <div style="color:#333333;text-decoration:none;">
                  <b>Paso 1. Perfil de la Empresa</b><br> <i>Registra el NIT y nombre de tu empresa. Establece los datos del administrador y otros ajustes que no podrán ser modificados.</i></div>
                  <hr>
                  <div style="color:#333333;text-decoration:none;">
                  <b>Paso 2. Datos de Sucursal</b><br> <i>Impuestos Nacionales proporciona el archivo con las llaves de dosificación para activar la facturación computarizada por sucursal. Los datos adicionales deben ser exactamente los que fueron registrados en el PBD.</i></div>
                  <hr>
                  <div style="color:#333333;text-decoration:none;">
                  <b>Paso 3. Cargado del Logo</b><br> <i>Se requiere tu logo en formato JPEG, GIF o PNG con una altura recomendada de 120 pixeles, luego podras centrearlo en el diseño de factura usando las flechas del teclado (no use el mouse)</i></div> <br>

                </ul>

              </div>
            </div>

      </div>


      <div style="padding-left:40px;padding-right:40px;display:none;min-height:130px" id="proPlanWorking">
        <h3>Trabajando...</h3>
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
      </div>

      <div style="background-color: #fff; padding-right:20px;padding-left:20px; display:none" id="proPlanSuccess">
        &nbsp;<br/>
        Satisfactorio
        <br/>&nbsp;
      </div>

       <div class="modal-footer" style="margin-top: 0px" id="proPlanFooter">
          <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>

          @if(Auth::user()->account->getOp1() && Auth::user()->account->getOp2() && Auth::user()->account->getOp3())
              <button type="button" class="btn btn-primary" id="proPlanButton" onclick="submitPlan()">ACEPTA QUE REVISO LOS DATOS</button>
          @else
              <button type="button" class="btn btn-primary" id="proPlanButton" disabled>ACEPTA QUE REVISO LOS DATOS</button>
          @endif


       </div>
      </div>
    </div>
  </div>

@endif

<p>&nbsp;</p>

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

  function submitPlan()
  {
    $('#proPlanDiv, #proPlanFooter').hide();
    $('#proPlanWorking').show();

    $.ajax({
      type: 'POST',
      url: '{{ URL::to('account/go') }}',
      success: function(result) {
        $('#proPlanSuccess, #proPlanFooter').show();
        $('#proPlanWorking, #proPlanButton').hide();
        $('#proPlanWorking, #proPlanButton2').hide();
        window.location = '{{ URL::to('logout') }}';
      }
    });

  }

  @endif

  function hideMessage() {
    $('.alert-info').fadeOut();
    $.get('/hide_message', function(response) {
      console.log('Reponse: %s', response);
    });
  }

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