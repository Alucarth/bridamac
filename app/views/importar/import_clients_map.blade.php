@extends('header')
<p>&nbsp;</p>
@section('content')

{{Former::framework('TwitterBootstrap3')}}

{{ Former::open('importar/clientes')->method('post')->addClass('warn-on-exit') }}

{{ Former::legend('Importar Clientes') }}

	@if ($headers)

		<table class="table">
			<thead>
				<tr>
					<th>Nombre de columna</th>
					<th>Primera columna</th>
					<th>Importar a</th>
				</tr>	
			</thead>		
		@for ($i=0; $i<count($headers); $i++)
			<tr>
				<td>{{ $headers[$i] }}</td>
				<td>{{ $data[1][$i] }}</td>
				<td>{{ Former::select('map[' . $i . ']')->options($columns, $mapped[$i], true)->raw() }}</td>
			</tr>
		@endfor
		</table>

		<span id="numClients"></span>
	@endif



	<center class="buttons">

	<a href="{{ url('importar/clientes') }}" class="btn btn-info" role="button">Cancelar</a>
	{{Former::submit('Importar')}}

	</center>

{{ Former::close() }}

	<script type="text/javascript">

		$(function() {

			var numClients = {{ count($data) }}-1;

			if (numClients == 1)
			{
				$('#numClients').html("Se creara un cliente");
			}
			else
			{
				$('#numClients').html("Se creará" + num + "clientes");
			}

		});

	</script>

@stop