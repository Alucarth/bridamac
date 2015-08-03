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
        		<h4>Reporte Mensual</h4>
      		</div>
   		</div>
  	</div>

	<div class="panel-body">

	<div class="row">

		<div class="col-md-10 col-md-offset-1">
		<canvas id="monthly-reports"></canvas>
		</div>

	</div>
 </div>
</div>
	
<script type="text/javascript">

 	var labels = [],data=[];

	var context = document.getElementById('monthly-reports').getContext('2d');

	var chart = {
		labels: {{ json_encode($labels) }},	
	      datasets : [
	        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
	          data : {{ json_encode($datasets) }},
	        }
	      ]
    };

    var options = {		
 responsive: true,
	};

tooltipTemplate: "<%if (label){%>a<%=label%>: <%}%>b<%= value %>",
	new Chart(context).Bar(chart, options);

 
</script>

@stop
