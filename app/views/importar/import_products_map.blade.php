@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h4>Importar Productos</h4>
          </div>
        </div>
    </div>

    <div class="panel-body">

		{{ Former::open('importar/productos')->method('post')->addClass('warn-on-exit') }}


		@if ($headers)

		  <div class="row">
		    <div class="col-md-8 col-md-offset-2">
				{{ Former::select('category_id')->label('Categoría')->style('width:420px')->fromQuery($categories, 'name', 'id') }}
				<hr>
			</div>
		  </div>

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
			<span id="numProducts"></span>
		@endif


		<center class="buttons">

			<a href="{{ url('importar/productos') }}" class="btn btn-default btn-lg"> Cancelar </a>
		    <button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar </button>

		</center>

		{{ Former::close() }}

    </div>
</div>

	<script type="text/javascript">

		$(function() {

			var numProducts = {{ count($data) }}-1;

			if (numProducts == 1)
			{
				$('#numProducts').html("Se creara un producto");
			}
			else
			{
				$('#numProducts').html("Se creará" + num + "productos");
			}

		});



	</script>

@stop