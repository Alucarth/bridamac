@extends('header')
@section('title')Ver Producto @stop
 @section('head') @stop
@section('encabezado') PRODUCTOS Y SERVICIOS @stop
@section('encabezado_descripcion') Ver Producto/Servicio @stop 
@section('nivel') <li><a href="{{URL::to('productos')}}"><i class="fa fa-cube"></i>Productos y Servicios</a></li>
            <li class="active">Ver </li> @stop
          
@section('content') 


<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"> <label></label>Detalle del {{$product->is_product?'Producto':'Servicio'}} :  {{ $product->notes }} </label></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">

  	<div class="row">

			<div class="col-md-8">
				
				<p><strong>Código del {{$product->is_product?'Producto':'Servicio'}} </strong> : {{ $product->product_key }}</p>
				<p><strong>Costo </strong> : {{ $product->cost }}</p>
				<p><strong>Categoría Asignada </strong> : {{ $product->category->name }}</p>
				@if($product->is_product)
					<p><strong>Unidad: </strong> {{ $product->unidad->nombre }}</p>
				@endif

			</div>

		</div>

            <div class="row">
                
              <div class="col-md-2">
                <a href="{{ URL::to('productos/'. $product->public_id.'/edit') }}" class="btn btn-primary btn-sm btn-block"> Editar {{$product->is_product?'Producto':'Servicio'}} &nbsp<span class="glyphicon glyphicon-pencil"></span></a>
              </div>
              <div class="col-md-2">
                   <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$product->product_key}}" data-href="{{ URL::to('productos/'. $product->public_id)}}" data-nombre="{{ 'Desea eliminar el producto '.$product->notes.' ?' }}" class="btn btn-danger btn-sm btn-block">Borrar {{$product->is_product?'Producto':'Servicio'}}&nbsp<span class="glyphicon glyphicon-trash">  </span></a>
               </div>
             </div>

				  
  </div><!-- /.box-body -->
  <div class="box-footer">
    
  </div><!-- box-footer -->
</div><!-- /.box -->


<!-- Modal Dialog -->
 <div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
   
      {{ Form::open(array('url' => 'productos/id','id' => 'formBorrar')) }}
      {{ Form::hidden('_method', 'DELETE') }}
      <div class="modal-body" id="frm_body">
      </div>
      <div class="modal-footer">
        
        {{ Form::submit('Si',array('class' => 'btn btn-primary col-sm-2 pull-right','style' => 'margin-left:10px;'))}}
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
        
        {{ Form::close()}}

      </div>
    </div>
  </div>
</div>

	
<script type="text/javascript">

	$('#formConfirm').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Recibiendo informacion del link o button
          // Obteniendo informacion sobre las variables asignadas en el ling atravez de atributos jquery
          var id = button.data('id') 
          var href= button.data('href')
          var nombre = button.data('nombre')
          
          var modal = $(this)
          modal.find('.modal-title').text('Eliminar producto ' + id)
          modal.find('.modal-body').text(nombre)
           $('#formBorrar').attr('action',href);
          

        });

</script>

@stop