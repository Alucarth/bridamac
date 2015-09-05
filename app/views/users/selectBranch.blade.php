@extends('layout')

@section('title') Asignación de Sucursal @stop

@section('head')

@stop

@section('body')
	     
		
		 {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('sucursal')->method('post')->rules(array( 
        'branch_id' => 'required'
     
    )) }}
    <br><br>
    	 <div class="col-md-10">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ Auth::user()->account->name}}</h3>
		  </div>
		  <div class="panel-body">
		   <div class="col-md-8">
		   	<legend>Asignación de Sucursales</legend>
		     {{-- {{ Former::legend('Asignacion de Sucursal') }} --}}
		     
		     <p> {{Auth::user()->first_name}}, por favor selecciona una sucursal para facturar :</p>
		     
		     {{ Former::select('branch_id')->addOption('','')->label('')
                    ->fromQuery($sucursales, 'name', 'branch_id') }}

              {{Former::large_primary_submit('Continuar')}}
              {{ Former::close() }}            
           </div>
		   
		  </div>
		</div>
	</div>
<!--script type="text/javascript">

	$(".dropdown-menu li a").click(function(){
	  var selText = $(this).text();
	  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
	});
</script-->

@stop