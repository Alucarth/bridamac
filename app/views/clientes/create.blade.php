@extends('header')
@section('title')Nuevo Cliente @stop
  @section('head') @stop
@section('encabezado') 	CLIENTES @stop
@section('encabezado_descripcion') Nuevo Cliente  @stop 
@section('nivel') <li><a href="{{URL::to('clientes')}}"><i class="ion-person"></i> Clientes</a></li>
            <li class="active"> Nuevo </li> @stop

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	{{-- <div class="panel-heading">
		<div class="row">
			<div class="col-md-6">
					<h4> Nuevo Cliente</h4>
			</div>
		</div>
	</div> --}}

	<div class="panel-body">

		{{ Former::open('clientes')->addClass('col-md-12 warn-on-exit')->method('POST')->rules(array(
	  				
	  		'name' => 'required',
	  		'business_name' => 'required',
	  		'nit' => 'required|Numeric',
	  		'phone' => 'Numeric',
	  		'work_phone' => 'Numeric',
	  		'email' => 'email',
	  		'first_name' => 'match:/[a-zA-Z. ]+/',
	  		'last_name' => 'match:/[a-zA-Z. ]+/'

		)); }}




		<div class="row">
			<div class="col-md-5">
				<legend><b>Datos del Cliente</b></legend>
				{{-- {{ Former::legend('Datos de Cliente') }} --}}
				<p>
					<label>Nombre *</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Cliente" aria-describedby="sizing-addon2" title="Ingrese el nombre del cliente" pattern="[a-zA-ZÑñÇç. ].{2,}" required>
				</p>
				{{-- {{ Former::text('name')->label('Nombre') }}      --}}
				{{-- {{ Former::text('work_phone')->label('Teléfono')->title('Solo se acepta Número Telefónico') }} --}}
				<p>	
				{{-- <div class="form-group">
				  <div class="col-md-6"> --}}
					<label >Teléfono</label>
					<input type="text" name="work_phone" id="work_phone"class="form-control" placeholder="Teléfono del Cliente" aria-describedby="sizing-addon2" title="Ingrese el número telefónico del cliente" pattern="([0-9]).{6,11}">
				  {{--  </div>
				</div> --}}
				</p>

				@if ($customLabel1)
					{{-- {{ Former::text('custom_value1')->label($customLabel1) }} --}}
					<p>
						<label>$customLabel1</label>
						<input type="text" name="custom_value1" class="form-control" placeholder="$customLabel1" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel2)
					{{-- {{ Former::text('custom_value2')->label($customLabel2) }} --}}
					<p>
						<label>$customLabel2</label>
						<input type="text" name="custom_value2" class="form-control" placeholder="$customLabel2" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel3)
					{{-- {{ Former::text('custom_value3')->label($customLabel3) }} --}}
					<p>
						<label>$customLabel3</label>
						<input type="text" name="custom_value3" class="form-control" placeholder="$customLabel3" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel4)
					{{-- {{ Former::text('custom_value4')->label($customLabel4) }} --}}
					<p>
						<label>$customLabel4</label>
						<input type="text" name="custom_value4" class="form-control" placeholder="$customLabel4" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel5)
					{{-- {{ Former::text('custom_value5')->label($customLabel5) }} --}}
					<p>
						<label>$customLabel5</label>
						<input type="text" name="custom_value5" class="form-control" placeholder="$customLabel5" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel6)
					{{-- {{ Former::text('custom_value6')->label($customLabel6) }} --}}
					<p>
						<label>$customLabel6</label>
						<input type="text" name="custom_value6" class="form-control" placeholder="$customLabel6" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel7)
					{{-- {{ Former::text('custom_value7')->label($customLabel7) }} --}}
					<p>
						<label>$customLabel7</label>
						<input type="text" name="custom_value7" class="form-control" placeholder="$customLabel7" aria-describedby="sizing-addon2">

					</p>
				@endif
				@if ($customLabel8)
					{{-- {{ Former::text('custom_value8')->label($customLabel8) }} --}}
					<p>
						<label>$customLabel8</label>
						<input type="text" name="custom_value8" class="form-control" placeholder="$customLabel8" aria-describedby="sizing-addon2">

					</p>
				@endif
				
				{{-- {{ Former::legend('Datos para Facturar') }} --}}
				<legend><b>Datos para Facturar</b></legend>
				<p>
				{{-- <div class="form-group">
				  <div class="col-md-5"> --}}
					<label>Razón Social *</label>
					<input type="text" name="business_name" id="business_name" class="form-control" placeholder="Razón Social del Cliente" aria-describedby="sizing-addon2" title="Ingrese la Razón Social" pattern=".{3,}" required>
				  {{--  </div>
				</div> --}}
				</p>

				{{-- {{ Former::text('business_name')->label('razón Social') }} --}}
				<p>	
			{{-- 	<div class="form-group">
				  <div class="col-md-4"> --}}
					<label >NIT/CI *</label>
					<input type="text" name="nit" id="work_phone"class="form-control" placeholder="NIT o CI del Cliente" aria-describedby="sizing-addon2" title="Ingrese el NIT" pattern="([0-9]).{6,11}" required>
				  {{--  </div>
				</div> --}}
				</p>

				{{-- {{ Former::text('nit')->label('NIT/CI') }} --}}
				<legend><b>Dirección</b></legend>
				<p>
 					<label>Zona/Barrio</label>
 					<input type="text" name="address1" id="address1" class="form-control" placeholder="Dirección de la Zona/Barrio del Cliente" aria-describedby="sizing-addon2" title="Ingrese el nombre de Zona/Barrio" pattern=".{3,}">
 					<label>Dirección</label>
 					<input type="text" name="address2" class="form-control" id="address2" placeholder="Dirección del Cliente" aria-describedby="sizing-addon2"  title="Ingrese la Dirección" pattern=".{3,}">

				</p>	
			{{-- 	{{ Former::legend('address') }}
				{{ Former::text('address1')->label('Zona/Barrio') }}
				{{ Former::text('address2')->label('Dirección') }} --}}

			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<legend><b>Contactos</b></legend>
				{{-- {{ Former::legend('Contactos') }} --}}
				<table  >
						<tbody  data-bind="foreach: setContactos">
		    				<tr>	 
		    						<td > <label>Nombres </label> <input name="contactos[first_name][]" class="form-control " data-bind="value: nombres" /> </td>
		            
		    				</tr>
		    				<tr><td><p></p></td></tr>
				            <tr>	
				            	 
				                <td ><label>Apellidos </label> <input name="contactos[last_name][]" class="form-control " data-bind="value: apellidos" /> </td>
				            
				            </tr>
				            <tr><td><p></p></td></tr>
				            <tr>
				            	 
				                <td ><label>Correo </label> <input name="contactos[email][]" class="form-control " data-bind="value: correo" /> </td>
				            
				            </tr>
				            <tr><td><p></p></td></tr>
				            <tr>
				            	 
				                <td ><label>Telefono </label><input name="contactos[phone][]" class="form-control " data-bind="value: telefono" /> </td>
				            
				            </tr>
		          
		    				<tr><td> <a href="#" data-bind="click: $root.removerContacto"> eliminar contacto</a></td></tr>
		    				<tr><td><p></p><p></p><td></tr>
		      
		    			</tbody>
				</table>
				<button type="button" id="add" data-bind="click: addContacto" class="btn btn-primary btn-sm" >Adicionar Contacto</button>
				<legend><b>Información Adicional</b></legend>
				{{-- {{ Former::legend('Información adicional') }} --}}
					@if ($customLabel9)
						<label>$custom_value9</label>
						<input type="text" name="custom_value9" placeholder="$custom_value9">
						{{-- {{ Former::text('custom_value9')->label($customLabel9) }} --}}
					@endif
					@if ($customLabel10)
						<label>$custom_value10</label>
						<input type="text" name="custom_value10" placeholder="$custom_value10">
						{{-- {{ Former::text('custom_value10')->label($customLabel10) }} --}}
					@endif
					@if ($customLabel11)
						<label>$custom_value11</label>
						<input type="text" name="custom_value11" placeholder="$custom_value11">
						{{-- {{ Former::date('custom_value11')->label($customLabel11) }} --}}
					@endif
					@if ($customLabel12)
						<label>$custom_value12</label>
						<input type="text" name="custom_value12" placeholder="$custom_value12">
						{{-- {{ Former::date('custom_value12')->label($customLabel12) }} --}}
				@endif
				<label>Antecedentes</label><br>

				<textarea name="private_notes"  class="form-class"cols="50" rows="3"placeholder="Ingrese Antecedentes"></textarea>
				{{-- {{ Former::textarea('private_notes')->label('Antecedentes') }} --}}

			</div>

		</div>
		<br>
		


		<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                 <a href="{{ url('clientes/') }}" class="btn btn-default btn-sm btn-block">Cancelar</a>
            </div>
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar</button>
            </div>
        </div>

		
		{{ Former::close() }}

	</div>
	Nota: (*) Campos requeridos.
</div> {{-- fin del panel default --}}

<script type="text/javascript">

	function Contacto(nombres,apellidos,correo,telefono)
		{
			var self = this;
      self.nombres = nombres;
      self.apellidos = apellidos;
      self.correo = correo;
      self.telefono = telefono;			
		}
		function Contactos()
		{
			var self = this;
			self.setContactos = ko.observableArray([new Contacto("","","","")]);
		
			 self.addContacto = function() {
			        self.setContactos.push(new Contacto(""," ","",""));
			    }
	       self.removerContacto = function(contacto){
                self.setContactos.remove(contacto);
              };
		}
		


		// Activates knockout.js
		ko.applyBindings(new Contactos());

</script>

@stop
