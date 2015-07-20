<!DOCTYPE html>
@extends('layout')

@section('title') Gestion de Usuarios @stop

@section('head')
   
  
    <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>



@stop

@section('body')
<div class="container">
    
     
     <div class="panel panel-default ">
        <div class="panel-body  " >

           {{ Datatable::table()
              ->addColumn('id','Username')      
              ->setUrl(route('api.users'))   
              ->render() }}

               
        </div>
    </div>
</div>
@stop