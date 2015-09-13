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
	    <h3 class="box-title">Datos de Producto</h3>
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
				
				<div class="row">
					<div class="col-md-10">
					{{-- {{ Former::legend('datos de Producto') }} --}}
						<p >
							<label>Código*</label>
							<input type="text" name="product_key" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2" title="Ingrese Código del Producto" pattern="^[a-zA-Z0-9-].{1,}" required >
						</p>
				
		      	{{-- {{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }} --}}
				      	<p>
					      	<label>Nombre *</label><br>
					      	<textarea name="notes" placeholder="Nombre del producto" class="form-control" rows="3"></textarea>
				     	 </p>
		     	 	</div>
				</div>
		      	{{-- {{ Former::textarea('notes')->label('Nombre') }} --}}
		      {{-- 	{{ Former::select('Unidad')->options('', '')->fromQuery(Unidad::all(), 'nombre', 'id')
															  ->help('Pick some dude')
															  ->state('warning')}} --}}
				<p>
					<label>Unidad</label>
					{{ Former::select('unidad_id')->addOption('','')->label('')
			                    ->fromQuery(Unidad::all(), 'nombre', 'id')
			                    ->help('Unidad de medida que manejara el producto')->class('form-control')
			                     }}

				</p>
				<div class="row">
					<div class="col-md-10">
						<label>Precio *</label>
					    <input class="form-control" type="text" name="cost" placeholder="Precio del Producto" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" >
				      	{{-- {{ Former::text('cost')->label('')->title('Solo se acepta números. Ejem: 500.00') }} --}}
					</div>
				</div>
				
			    

			</div>
			{{-- <div class="col-md-1"></div> --}}
			<div class="col-md-5">
				<legend>Categoría</legend>
				{{-- {{ Former::legend('Categoria') }} --}}
				<div class="row">
					
					<div class="col-md-9">
						 <select class="form-control" name="category_id" id="category_id">
						  	@foreach($categories as $categoria)
						    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
						    
							@endforeach
							
						  </select>	
					</div>
					
				</div>	
				 
		    	{{-- {{ Former::select('category_id')->label(' ')->fromQuery($categories, 'name', 'id') }} --}}

			</div>
		</div>
		<br><br>
		<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                 <a href="{{ url('productos/') }}" class="btn btn-default btn-sm btn-block">Cancelar</a>
            </div>
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar</button>
            </div>
        </div>


		{{ Former::close() }}
		Nota: (*) Campos requeridos

	  </div><!-- /.box-body -->
	  <div class="box-footer">
	   
	  </div><!-- box-footer -->
	</div><!-- /.box -->




@stop