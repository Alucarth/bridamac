@extends('header')

@section('content') 

<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h3>Categorias</h3>
  {{ $table->render() }}
  {{ $table->script() }}
  </div>
</div>

@stop