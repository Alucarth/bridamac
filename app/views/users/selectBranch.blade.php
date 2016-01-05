@extends('layout')

@section('title') Asignaci&oacute;n de Sucursal @stop

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
			   
			   	<legend>Asignaci&oacute;n de Dosificaci&oacute;n</legend>
			     {{-- {{ Former::legend('Asignacion de Sucursal') }} --}}
			
			     <p> {{Auth::user()->first_name}}, por favor selecciona una dosificaci&oacute;n para facturar:</p>
			     
			     {{ Former::select('branch_id')->addOption('','')->label('')
	                    ->fromQuery($sucursales, 'name', 'branch_id') }}
                            <!--<label>Tipo de impresora</label><br>-->
                              <div class="panel-group" style="display: none;">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" href="#collapse1">Tipo de Impresora</a>
                                    </h4>
                                  </div>
                                  <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <input type="radio" name="printer" value="1" <?php if(Session::get('printer')=="1" || !Session::get('printer')){ ?>checked <?php }?>>Normal
                              
                                    </div>
                                    <div class="panel-footer">
                                        <input type="radio" name="printer" value="0" <?php if(Session::get('printer')=="0"){ ?>checked <?php }?>>Fiscal
                                    </div>
                                  </div>
                                </div>
                              </div>
                            
                            <hr>
                            
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