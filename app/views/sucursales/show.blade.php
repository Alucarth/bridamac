@extends('header')
@section('title')Ver Sucursal @stop
 @section('head') @stop
@section('encabezado') SUCURSALES @stop
@section('encabezado_descripcion') Ver Sucursal @stop 
@section('nivel') <li><a href="{{URL::to('sucursales')}}"><i class="glyphicon glyphicon-home"></i> Sucursales</a></li>
            <li class="active"> Ver </li> @stop
          

@section('content')
	
	{{Former::framework('TwitterBootstrap3')}}
 
  	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">Información de {{$sucursal->name}}</h3>
	    <div class="box-tools pull-right">
	      <!-- Buttons, labels, and many other things can be placed here! -->
	      <!-- Here is a label for example -->
	      {{-- <span class="label label-primary">Label</span> --}}
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    	<div class="row">
		    <div class="col-md-6">
		    	  <p>{{ Form::label('Nombre: ') }} {{$sucursal->name}} </p> 
		    	  <p>{{ Form::label('Actividad Economica : ') }} {{$sucursal->economic_activity}} </p>
		    	 
		    	  <p>{{ Form::label('Facturas Emitidas: ') }} {{$sucursal->invoice_number_counter-1}} </p>
		    	  
		    	  <div class="btn-group">
					  <button class="btn btn-info btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Opciones <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
					   	
						<li><a href="#">{{link_to('sucursales/'.$sucursal->public_id.'/edit', 'Editar' ) }}</a></li>
						  
                        <li>

                            <a href="#" data-toggle="modal"  data-target="#formConfirm" data-id="{{$sucursal->public_id}}" data-href="{{ URL::to('sucursales/'. $sucursal->id)}}" data-nombre="{{$sucursal->name.' '.$sucursal->work_phone.' ' }}" > Borrar</a>
                        

                         </li>	

					  </ul>
				</div>


			</div>
		    <div class="col-md-6">

		      {{ Former::legend('Direccion') }}

	          <p>{{ Form::label('Dirección: ') }} {{$sucursal->address2}} </p> 	
              <p>{{ Form::label('Zona/Barrio: ') }} {{$sucursal->address1}} </p>
		      <p>{{ Form::label('Telefono: ') }} {{$sucursal->work_phone}} </p>
		      <p>{{ Form::label('Ciudad: ') }} {{$sucursal->city}} </p>
		      <p>{{ Form::label('Municipio: ') }} {{$sucursal->state}} </p>
		    	    	 	
		    </div>
		    <div class="col-md-4">
		    	 {{ Former::legend('Dosificación') }}

                <p>{{ Form::label('Numero de Autorizacion: ') }} {{$sucursal->number_autho}} </p>
                <p>{{ Form::label('Fecha Limite de Emision: ') }} {{$sucursal->deadline}} </p>
                <p>{{ Form::label('LLave de Dosificación: ') }} {{$sucursal->key_dosage}} </p>
              
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
   
      {{ Form::open(array('url' => 'sucursales/id','id' => 'formBorrar')) }}
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
          modal.find('.modal-title').text('Borrar usuario ' + id)
          modal.find('.modal-body').text(nombre)
           $('#formBorrar').attr('action',href);
          

        });

  </script>




@stop