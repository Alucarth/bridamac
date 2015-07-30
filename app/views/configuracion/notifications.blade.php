@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
  	<div class="panel-heading">
    	<div class="row">
      		<div class="col-md-6">
        		<h4>Notificaciones de Correo</h4>
      		</div>
    	</div>
 	</div>

	<div class="panel-body">

		{{ Former::open()->addClass('col-md-8 col-md-offset-2 warn-on-exit') }}	

		{{ Former::populateField('notify_sent', intval(Auth::user()->notify_sent)) }}
		{{ Former::populateField('notify_viewed', intval(Auth::user()->notify_viewed)) }}
		{{ Former::populateField('notify_paid', intval(Auth::user()->notify_paid)) }}

		<div class="row">
	     	<div class="col-md-6">

	     		<p>Enviar correo electrónico cuando una factura sea:</p>
	     	</div>
	     	<div class="col-md-6">
				{{ Former::checkbox('notify_sent')->label('&nbsp;')->text('envíada') }}
				{{ Former::checkbox('notify_viewed')->label('&nbsp;')->text('visualizada') }}
				{{ Former::checkbox('notify_paid')->label('&nbsp;')->text('pagada') }}
			</div>
        <center class="buttons">

        	<button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar Cambios </button>

        </center>
		</div>

		 {{ Former::close() }}
  	</div>
</div>

@stop