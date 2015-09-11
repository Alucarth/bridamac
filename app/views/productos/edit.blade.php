@extends('header')
@section('title')Nuevo Producto @stop
  @section('head') @stop
@section('encabezado') PRODUCTO @stop
@section('encabezado_descripcion') Editar Producto XD @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li><i class="glyphicon glyphicon-compressed"></i> Productos</li>
            <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-body">
		
		{{ Former::open($url)->addClass('col-md-12 warn-on-exit')->method($method)}}
	  	<input name="is_product" type="hidden" value="1">
		<div class="row">
			<div class="col-md-4">
				<legend>Datos de Producto</legend>
				<div class="row">
					<div class="col-md-10">
					{{-- {{ Former::legend('datos de Producto') }} --}}
						<p >
							<label>Código*</label>
							<input type="text" name="product_key" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2" title="Ingrese Código del Producto" pattern="^[a-zA-Z0-9-].{1,}" required disabled  value="{{$product->product_key}}">
						</p>
					</div>
				</div>

		      	{{-- {{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }} --}}
		      	<p>
			      	<label>Nombre *</label><br>
			      	<textarea name="notes" placeholder="Nombre del producto" cols="46" rows="3" >{{$product->notes}}</textarea>
		     	 </p>
		      	{{-- {{ Former::textarea('notes')->label('Nombre') }} --}}
		      {{-- 	{{ Former::select('Unidad')->options('', '')->fromQuery(Unidad::all(), 'nombre', 'id')
															  ->help('Pick some dude')
															  ->state('warning')}} --}}
				<p>
					<label>Unidad</label>
				
				 	<select class="form-control" name="unidad_id" >
						  	@foreach(Unidad::all() as $u)
						    <option  <?php if($u->id==$product->unidad_id){?>
						    		SELECTED<?php }?>    value="{{$u->id}}"  >{{$u->nombre}}</option>
						    
							@endforeach
							
					 </select>	



					{{-- Former::select('unidad_id')->addOption('','')->label('')
			                    ->fromQuery(Unidad::all(), 'nombre', 'id')
			                    ->help('Unidad de medida que manejara el producto')
					                     --}}

				</p>
				<div class="row">
					<div class="col-md-10">
						<label>Precio *</label>
					    <input class="form-control" type="text" name="cost" placeholder="Precio del Producto" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern=".[0-9.].{1,}" required value="{{$product->cost}}">
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
						 <select class="form-control" name="category_id" >
						  	@foreach($categories as $categoria)
						    <option  <?php if($product->category_id==$categoria->id){?>
						    		SELECTED<?php }?>  value="{{$categoria->id}}"  >{{$categoria->name}}</option>
						    
							@endforeach
							
						  </select>	
					</div>
					<div class="col-md-3">
						<a href="{{ url('categorias')}} " class="btn btn-primary" > Categorías </a>	
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
	</div>
</div>


@stop


