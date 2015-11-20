@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h4>Importar Clientes</h4>
          </div>
        </div>
    </div>

    <div class="panel-body">

		{{ Former::open('importar/clientes')->method('post')->addClass('warn-on-exit') }}

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
			<hr>
			<span id="numClients"></span>
		@endif

		<center class="buttons">

			<a href="{{ url('importar/clientes') }}" class="btn btn-default btn-lg"> Cancelar </a>
		    <button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar </button>

		</center>

		{{ Former::close() }}

    </div>
</div>


<script type="text/javascript">

	$(function() {

		var numClients = {{ count($data) }}-1;

		if (numClients == 1)
		{
			$('#numClients').html("Se importa un cliente.");
		}
		else
		{
			$('#numClients').html("Se importa " + num + " clientes.");
		}

	});

</script>

@stop