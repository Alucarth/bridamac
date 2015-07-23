@extends('header')
<p>&nbsp;</p>
@section('content')

{{Former::framework('TwitterBootstrap3')}}

{{ Former::open('importar/productos')->method('post')->addClass('warn-on-exit') }}

{{ Former::legend('Importar Productos') }}

	@if ($headers)

	  <div class="row">
	    <div class="col-md-12">
		      {{ Former::select('category_id')->label('Categoría')->style('width:300px')->fromQuery($categories, 'name', 'id') }}
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

		<span id="numProducts"></span>
	@endif


{{ Former::actions()->large_primary_submit('Subir Archivo')->append_with_icon('open') }}
{{ Former::close() }}

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