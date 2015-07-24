<!DOCTYPE html>
@extends('layout')

@section('title') Gestion de Usuarios @stop

@section('head')

    {{-- cdn --}}
    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables-1.10.7/media/css/jquery.dataTables.css')}}"> --}}

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.js')}} "></script>
      
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/DataTables-1.10.7/media/js/jquery.dataTables.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.css')}}">

    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/Plugins-master/integration/bootstrap/3/dataTables.bootstrap.js')}}"></script>
    
{{--     <link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" media="screen"> --}}
   
   {{-- <link href="{{ asset('vendor/gsf/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen"> --}}

   {{-- <link href="{{ asset('vendor/gsf/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen"> --}}
   {{-- <link href="{{ asset('vendor/gsf/DT/styles.css') }}" rel="stylesheet" media="screen"> --}}
   {{-- <link href="{{ asset('vendor/gsf/DT/DT_bootstrap.css') }}" rel="stylesheet" media="screen"> --}}
   {{-- <link href="{{ asset('vendor/gsf/DT2/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen"> --}}

  {{-- {{ HTML::style('vendor/datatables/media/css/jquery.dataTables.min.css', array('media' => 'screen')) }} --}}
  {{-- {{ HTML::script('vendor/daviddependencias/jquery-1.11.1.min.js') }} --}}
  {{-- {{ HTML::script('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }} --}}


   {{--<script src="{{ asset('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }}" type="text/javascript"></script>--}}


{{--   {{ HTML::style('vendor/datatables/media/css/jquery.dataTables.css', array('media' => 'screen'))}}
  <script src="{{ asset('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }}" type="text/javascript"></script>
 --}}  {{-- {{ HTML::script('vendor/datatables/media/js/assets/js/jquery.dataTables.min.js') }} --}}

  {{-- {{ HTML::style('vendor/datatables/media/css/jquery.dataTables_themeroller.css', array('media' => 'screen')) }} --}}
  {{-- {{ HTML::style('vendor/daviddependencias/bootstrap.min.css', array('media' => 'screen')) }} --}}
  {{-- {{ HTML::style('vendor/daviddependencias/dataTables.bootstrap.css', array('media' => 'screen')) }} --}}
 {{-- 
  {{HTML::script('vendor/datatables/media/js/jquery.dataTables.js') }}
  {{ HTML::script('vendor/daviddependencias/jquery.dataTables.min.js') }}
  {{ HTML::script('vendor/daviddependencias/dataTables.bootstrap.js') }}
   --}}

  
  {{-- {{HTML::script('vendor/datatables-bootstrap3/BS3/assets/js/dataTables.js')}} --}}

@stop

@section('body')
	     
  <p></p>
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Gestion Usuarios</h3>
  </div>
  <div class="panel-body">

         {{-- Datatable::table()
        ->addColumn('id','Name')       // these are the column headings to be shown
        ->setUrl(route('api.users'))   // this is the route where data will be retrieved
        ->render()--}}

        manual
        <table id="mitabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Nu</td>
                  <td>Usuario</td>
                  <td>Nombre</td>
                  <td>Apellido</td>
                  <td>Correo</td>
                  <td>Accion</td>
              </tr>
          </thead>
          <tbody>

          @foreach($usuarios as $usuario)
              <tr>
                  <td>{{ $usuario->id }}</td>
                  <td>{{ $usuario->username }}</td>
                  <td>{{ $usuario->first_name }}</td>
                  <td>{{ $usuario->last_name }}</td>
                  <td>{{ $usuario->email}}</td>

                  <!-- we will also add show, edit, and delete buttons -->


                  <td>
                      <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Seleccionar
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ URL::to('users/'. $usuario->id) }}">Ver detalle</a></li>
                        <li><a href="{{ URL::to('users/'. $usuario->id .'/edit') }}">Editar Usuario</a></li>
                      </ul>
                    </div>
                    <div class="dropdown">                

                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
     </div>
  </div>

  <script type="text/javascript">
    $(document).ready( function () {
    $('#mitabla').DataTable(
        {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Nothing found - sorry",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
     }
      );

    } );
  </script>

        {{-- {{HTML::script('vendor/gsf/jquery-1.9.1.js')}} --}}
       {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>  --}}


        {{-- {{ HTML::script('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }} --}}


        {{-- {{HTML::script('vendor/gsf/bootstrap/js/bootstrap.min.js')}} --}}
        {{-- {{HTML::script('vendor/gsf/datatables/js/jquery.dataTables.min.js')}} --}}
        {{-- {{HTML::script('vendor/gsf/DT2/jquery.dataTables.min.js')}} --}}
        {{-- {{HTML::script('vendor/gsf/DT/DT_bootstrap.js')}} --}}
        {{-- {{HTML::script('vendor/gsf/DT2/jquery.dataTables.min.js')}} --}}
        
@stop



