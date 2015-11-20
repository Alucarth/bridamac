@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">
				<h4>Campos Adicionales de Clientes</h4>
			</div>
		</div>
	</div>

	<div class="panel-body">

		{{ Former::open()->addClass('warn-on-exit') }}
		{{ Former::populate($account) }}

		<div class="row">

			<div class="col-md-6">
				{{ Former::legend('Índice') }}
				{{ Former::text('custom_client_label1')->label('Etiqueta del campo') }}
				
				{{ Former::legend('Fechas') }}
				{{ Former::text('custom_client_label11')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label12')->label('Etiqueta del campo') }}
			</div>

			<div class="col-md-6">
				{{ Former::legend('Campos Extras') }}
				{{ Former::text('custom_client_label2')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label3')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label4')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label5')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label6')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label7')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label8')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label9')->label('Etiqueta del campo') }}
				{{ Former::text('custom_client_label10')->label('Etiqueta del campo') }}
			</div>
		</div>
		
		<center class="buttons">

			<button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar Cambios </button>

		</center>

		{{ Former::close() }}

	</div>
</div>

@stop