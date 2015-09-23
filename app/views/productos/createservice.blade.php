@extends('header')
@section('title')Nuevo Servicio @stop
  @section('head') @stop
@section('encabezado')  SERVICIOS @stop
@section('encabezado_descripcion') Nuevo Servicio  @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li><i class="glyphicon glyphicon-briefcase"></i> Servicios</li>
        <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}


	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title">Datos del Servicio</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	     
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    	
	    	{{ Former::open('productos')->method('POST')}}

	  		<input name="is_product" type="hidden" value="0">
	  		<input name="unidad_id" type="hidden" value="2">
		<div class="row">
			<div class="col-md-4">

				{{-- {{ Former::legend('datos de Servicio') }} --}}
				{{-- <legend><b>Datos de Servicio</b></legend> --}}
				<div class="col-md-5">
					<label>Código *</label>
					<input type="text" name="product_key" class="form-control" placeholder="Código" aria-describedby="sizing-addon2"  title="Solo se acepta Letras, Números y guión(-)." pattern="^[a-zA-Z0-9-].{1,}" required >
				</div>
				<div class="col-md-10">
					<label>Nombre *</label>
					<input type="text" name="notes" class="form-control" placeholder="Nombre del Servicio" aria-describedby="sizing-addon2"  title="Introduzca el nombre del Nuevo Servicio." pattern=".{1,}" required >
				</div>
				<div class="col-md-5">
					<label>Precio *</label>
					<input type="text" name="cost" class="form-control" placeholder="Precio" aria-describedby="sizing-addon2"  title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" required >
				</div>				

			</div>
			{{-- <div class="col-md-1"></div> --}}
			<div class="col-md-4">
				<legend>Categoría</legend>
				{{-- {{ Former::legend('Categoria') }} --}}
				<div class="row">
					
					<div class="col-md-8">
						 <select class="form-control" name="category_id" id="category_id">
						  	@foreach($categories as $categoria)
						    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
						    
							@endforeach
							
						  </select>	
					</div>
					
				</div>	
				 
		   



			</div>
		</div>
		<br><br>
		<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                 <a href="{{ url('productos/') }}" class="btn btn-default btn-sm btn-block">Cancelar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-remove">  </span></a>
            </div>
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
            </div>
        </div>

	{{ Former::close() }}
	  </div><!-- /.box-body -->
	  <div class="box-footer">
	   
	  </div><!-- box-footer -->
	</div><!-- /.box -->
	<script type="text/javascript">

		$("form").submit(function() {
		    $(this).submit(function() {
		        return false;
		    });
		    return true;
		});
	</script>


@stop