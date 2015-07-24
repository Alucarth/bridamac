@extends('header')

@section('content') 




<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h3>Categorias</h3>

  	<div class="pull-right">
		<div class="btn-group">
		  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Opciones <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		   	<li><a href="#">{{ link_to('categorias/create', 'Crear Categoría') }}</a></li>
		  </ul>
		</div>
	</div>


  {{ $table->render() }}
  {{ $table->script() }}
  </div>
</div>

@stop