<!DOCTYPE html>
@extends('layout')

@section('title') Gestion de Usuarios @stop

@section('head')
   
  {{-- {{ HTML::style('vendor/datatables-bootstrap3/BS3/assets/csss/dataTables.css', array('media' => 'screen')) }} --}}
  <script src="{{ asset('vendor/datatables-bootstrap3/BS3/assets/js/datatables.js') }}" type="text/javascript"></script>
  {{ HTML::style('vendor/datatables/media/css/jquery.dataTables.css', array('media' => 'screen')) }}
  {{-- {{ HTML::style('vendor/datatables/media/css/jquery.dataTables_themeroller.css', array('media' => 'screen')) }} --}}

  {{-- {{ HTML::script('vendor/datatables/media/js/jquery.dataTables.js') }} --}}


  {{-- HTML::script('vendor/datatables-bootstrap3/BS3/assets/js/dataTables.js') --}}
    




@stop

@section('body')

          {{ Datatable::table()
              ->addColumn('id','Username')      
              ->setUrl(route('api.users'))   
              ->render()
          }}
@stop


