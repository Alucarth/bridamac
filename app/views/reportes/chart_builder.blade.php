@extends('header')

@section('head')
	@parent

	<script src="{{ asset('js/Chart.js') }}" type="text/javascript"></script>		
@stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
    	<div class="row">
     		<div class="col-md-6">
        		<h4>Actualización de Productos en la Factura</h4>
      		</div>
   		</div>
  	</div>

	<div class="panel-body">

	<div class="row">
		<div class="col-lg-3">

			{{ Former::open()->addClass('warn-on-exit') }}
			{{ Former::populateField('month', $startDate) }}

			{{ Former::text('month')->label('Mes')
					->append('<i class="glyphicon glyphicon-calendar" onclick="toggleDatePicker(\'start_date\')"></i>') }}

	        <center class="buttons">

	          <button type="submit" class="btn btn-success btn-lg dropdown-toggle"> Guardar Cambios </button>

	        </center>	

			{{ Former::close() }}

			<p>&nbsp;</p>
			<div style="padding-bottom:8px">
				<div style="float:left; height:22px; width:60px; background-color:rgba(78,205,196,.5); border: 1px solid rgba(78,205,196,1)"></div>
				<div style="vertical-align: middle">&nbsp;Facturas</div>
			</div>			


		</div>
		<div class="col-lg-9">
			<canvas id="monthly-reports" width="870" height="500"></canvas>
		</div>

	</div>
 </div>
</div>
	<script type="text/javascript">

	var ctx = document.getElementById('monthly-reports').getContext('2d');
	var chart = {
		labels: {{ json_encode($labels) }},		
		datasets: [
		@foreach ($datasets as $dataset)
			{
				data: {{ json_encode($dataset['totals']) }},
				fillColor : "rgba({{ $dataset['colors'] }},0.5)",
				strokeColor : "rgba({{ $dataset['colors'] }},1)",
			},
		@endforeach
		]
	}

	var options = {		
		scaleOverride: true,
		scaleSteps: 10,
		scaleStepWidth: {{ $scaleStepWidth }},
		scaleStartValue: 0,
		scaleLabel : "<%=value%>",
	};

	new Chart(ctx).Bar(chart, options);

	</script>

@stop


@section('onReady')

	$('#start_date, #end_date').datepicker({
		autoclose: true,
		todayHighlight: true,
		keyboardNavigation: false
	});

@stop