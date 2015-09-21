@extends('layout')

@section('title') Asignación de Sucursal @stop

@section('head')

@stop

@section('body')
	     
		
		 {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('sucursal')->method('post')->rules(array( 
        'branch_id' => 'required'
     
    )) }}
</br></br><br>
    <div class="content">

    	<div class="col-md-4">
    	</div>
    	<div class="col-md-4">


			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h2 class="panel-title">{{ strtoupper(Auth::user()->account->name)}} </h2>
			  </div>
			  <div class="panel-body">
			   
			   	<legend>Asignación de Sucursal</legend>
			     {{-- {{ Former::legend('Asignacion de Sucursal') }} --}}
			
			     <p> {{Auth::user()->first_name}}, por favor selecciona una sucursal para facturar:</p>
			     
			     {{ Former::select('branch_id')->addOption('','')->label('')
	                    ->fromQuery($sucursales, 'name', 'branch_id') }}

	              {{Former::large_primary_submit('Continuar')}}
	              {{ Former::close() }}            
	           
			   
			  </div>
			</div>
		</div>
		<div class="col-md-4">
    	</div>

    </div>
   
    	
<!--script type="text/javascript">

	$(".dropdown-menu li a").click(function(){
	  var selText = $(this).text();
	  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
	});
</script-->

@stop