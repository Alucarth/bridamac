@extends('layout')

@section('title') Asignacion de Sucursal @stop

@section('head')

@stop

@section('body')
	     
		
		 {{Former::framework('TwitterBootstrap3')}}
  {{ Former::open('sucursal')->method('post')->rules(array( 
        'branch_id' => 'required'
     
    )) }}

    	 <div class="col-md-10">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ Account::find(Auth::user()->account_id)->select('name')->first()->name}}</h3>
		  </div>
		  <div class="panel-body">
		   <div class="col-md-8">
		     {{ Former::legend('Asignacion de Sucursal') }}
		     <p> {{Auth::user()->first_name}}, por favor selecciona una sucursal a facturar :</p>
		     {{ Former::select('branch_id')->addOption('','')->label('')
                    ->fromQuery(UserBranch::getSucursales(Auth::user()->id), 'name', 'branch_id') }}
              {{Former::large_primary_submit('Continuar')}}
              {{ Former::close() }}            
           </div>
		     {{-- <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select2" data-toggle="dropdown" href="#">Seleccione una sucursal  <span class="caret"></span></a>
	            <ul class="dropdown-menu">
	            	 @foreach(UserBranch::getSucursales(Auth::user()->id) as $sucursal)
					  <li><a href="#">{{$sucursal->name}}</a></li>
					  @endforeach	  

	            </ul>
	        </div> 		

	         <div class="btn-group">
	            <button type="button" id="btnContinuar" class="btn btn-primary">Continuar</button>
	        </div> --}}
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