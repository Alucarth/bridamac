@extends('header')
@section('title')Nuevo Servicio @stop
  @section('head') @stop
@section('encabezado')  SERVICIOS @stop
@section('encabezado_descripcion') Nuevo Servicio  @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li><i class="glyphicon glyphicon-briefcase"></i>Servicios</li>
        <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-body">

		{{ Former::open('productos')->addClass('col-md-12 warn-on-exit')->method('POST')->rules(array(
	  		
	  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
	  		'notes' => 'required', 
	  		'cost' => 'required|Numeric', 
	  		
	  	)); }}
	  		<input name="is_product" type="hidden" value="0">
	  		<input name="unidad_id" type="hidden" value="2">
		<div class="row">
			<div class="col-md-4">

				{{-- {{ Former::legend('datos de Servicio') }} --}}
				<legend>Datos de Servicio</legend>
				<div class="col-md-10">
					<label>Código *</label>
					<input type="text" name="product_key" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Solo se acepta Letras, Números y guión(-)." pattern="^[a-zA-Z0-9-].{1,}" required >
					<label>Nombre *</label>
					<input type="text" name="notes" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Introduzca el nombre del Nuevo Servicio." pattern=".{1,}" required >
					<label>Precio *</label>
					<input type="text" name="cost" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Solo se acepta números. Ejem: 500.00" pattern="^[a-zA-Z0-9-].{1,}" required >

			      	{{-- {{ Former::text('product_key')->label('Código')->title('Solo se acepta Letras, Números y guión(-).') }} --}}
			      	{{-- {{ Former::textarea('notes')->label('Nombre') }} --}}

			      	{{-- {{ Former::text('cost')->label('Precio')->title('Solo se acepta números. Ejem: 500.00') }} --}}
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
</div>
@stop