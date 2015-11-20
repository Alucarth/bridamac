@extends('header')
@section('title')Nuevo Producto @stop
  @section('head') @stop
@section('encabezado') PRODUCTOS @stop
@section('encabezado_descripcion') Nuevo Producto @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li><i class="glyphicon glyphicon-compressed"></i> Productos</li>
            <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Datos del Producto</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    
	  		{{ Former::open('productos')->addClass('col-md-12 warn-on-exit')->method('POST') }}
	  	<input name="is_product" type="hidden" value="1">
		<div class="row">
			<div class="col-md-4">
				{{-- <legend>Datos del Producto</legend> --}}
				
				<div class="row">
					<div class="col-md-5">
						<p >
							<label>Código*</label>
							<input type="text" name="product_key" class="form-control" placeholder="Código" aria-describedby="sizing-addon2" title="Ingrese Código del Producto" pattern="^[a-zA-Z0-9-].{1,}" required >
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
					
				      	<p>
					      	<label>Nombre *</label><br>
					      	<textarea name="notes" placeholder="Nombre del producto" class="form-control" rows="3" title="Ingrese descripcion del Producto" pattern=".{1,}"required></textarea>
				     	 </p>
		     	 	
				
		    
				<p>
					<label>Unidad</label>
					<select class="form-control" name="unidad_id" >
						  	@foreach(Unidad::all() as $u)
						    <option  value="{{$u->id}}"  >{{$u->nombre}}</option>
						    
							@endforeach
							
					 </select>	

					

				</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label>Precio *</label>
					    <input class="form-control" type="text" name="cost" placeholder="Precio" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
				      
					</div>
				</div>
				
			    

			</div>
		
			<div class="col-md-5">
				<legend>Categoría</legend>
				
				<div class="row">
					
					<div class="col-md-9">
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
		Nota: (*) Campos requeridos

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