@extends('header')
@section('title')Nuevo Servicio @stop
  @section('head') @stop
@section('encabezado')  SERVICIOS @stop
@section('encabezado_descripcion') Editar Servicio {{$product->notes}} @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i> Productos y Servicios</a></li><li><i class="glyphicon glyphicon-briefcase"></i>Servicios</li>
        <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Datos de Servicio</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
		{{ Former::open($url)->addClass('col-md-12 warn-on-exit')->method($method)->rules(array(
  		
  		'product_key' => 'required|match:/[a-zA-Z0-9.-]+/', 
  		'notes' => 'required', 
  		'cost' => 'required|Numeric', 
  		
	  	)); }}
	  		<input name="is_product" type="hidden" value="0">
	  		<input name="unidad_id" type="hidden" value="2">
		<div class="row">
			<div class="col-md-4">

			
				
				<div class="col-md-5">
					<label>Código *</label>
					<input type="text" name="product_key" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Solo se acepta Letras, Números y guión(-)." pattern="^[a-zA-Z0-9-].{1,}" required  value="{{$product->product_key}}" >
				</div>
				<div class="col-md-10">
					<label>Nombre *</label>
					<input type="text" name="notes" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Introduzca el nombre del Nuevo Servicio." pattern=".{1,}" value="{{$product->notes}}" >

				</div>
				<div class="col-md-5">
					<label>Precio *</label>
					<input type="text" name="cost" class="form-control" placeholder="Código del Producto" aria-describedby="sizing-addon2"  title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" required value="{{$product->cost}}">

				</div>
					
					

			     
				
				

			</div>
			{{-- <div class="col-md-1"></div> --}}
			<div class="col-md-4">
				<legend>Categoría</legend>
				{{-- {{ Former::legend('Categoria') }} --}}
				<div class="row">
					
					<div class="col-md-8">
						 <select id="category_id" class="form-control" name="category_id" id="category_id">
						  	@foreach($categories as $categoria)
						    <option  <?php if($product->category_id==$categoria->id){?>
						    		SELECTED<?php }?>  value="{{$categoria->id}}"  >{{$categoria->name}}</option>
						    
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




	
@stop
