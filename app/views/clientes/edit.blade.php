@extends('header')

@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">				
					<h4>Nuevo Cliente</h4>				
			</div>
		</div>
	</div>

	<div class="panel-body">

		{{ Former::open($url)->addClass('col-md-12 warn-on-exit')->method('PUT')->rules(array(
	  				
	  		'name' => 'required',
	  		'business_name' => 'required',
	  		'nit' => 'required|Numeric',
	  		'phone' => 'Numeric',
	  		'work_phone' => 'Numeric',
	  		'email' => 'email',
	  		'first_name' => 'match:/[a-zA-Z. ]+/',
	  		'last_name' => 'match:/[a-zA-Z. ]+/'

		)); }}

		@if ($client)
			{{ Former::populate($client) }}
		@endif



		<div class="row">
			<div class="col-md-4">
				<legend><b>Datos del Cliente</b></legend>
				{{-- {{ Former::legend('Datos de Cliente') }} --}}
				<p>
					<label>Nombre *</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Cliente" aria-describedby="sizing-addon2" required title="Ingrese el nombre del cliente">
				</p>
				{{-- {{ Former::text('name')->label('Nombre') }}      --}}
				{{-- {{ Former::text('work_phone')->label('Teléfono')->title('Solo se acepta Número Telefónico') }} --}}
				<p>	
				{{-- <div class="form-group">
				  <div class="col-md-6"> --}}
					<label >Teléfono*</label>
					<input type="text" name="work_phone" id="work_phone"class="form-control" placeholder="Teléfono del Cliente" aria-describedby="sizing-addon2" required title="Ingrese el número telefónico del cliente">
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
					<input type="text" name="business_name" id="business_name" class="form-control" placeholder="Razón Social del Cliente" aria-describedby="sizing-addon2" required title="Ingrese la Razón Social">
				  {{--  </div>
				</div> --}}
			</p>

				{{-- {{ Former::text('business_name')->label('razón Social') }} --}}
				<p>	
			{{-- 	<div class="form-group">
				  <div class="col-md-4"> --}}
					<label >NIT/CI *</label>
					<input type="text" name="nit" id="work_phone"class="form-control" placeholder="NIT o CI del Cliente" aria-describedby="sizing-addon2" required title="Ingrese el NIT">
				  {{--  </div>
				</div> --}}
			</p>

				{{-- {{ Former::text('nit')->label('NIT/CI') }} --}}
				<legend><b>Dirección</b></legend>
				<p>
 					<label>Zona/Barrio</label>
 					<input type="text" name="address1" id="address1" class="form-control" placeholder="Dirección de la Zona/Barrio" aria-describedby="sizing-addon2" required title="Ingrese el nombre de Zona/Barrio">
 					<label>Dirección</label>
 					<input type="text" name="address2" class="form-control" id="address2" placeholder="Dirección del Cliente" aria-describedby="sizing-addon2" required title="Ingrese la Dirección">

				</p>	
			{{-- 	{{ Former::legend('address') }}
				{{ Former::text('address1')->label('Zona/Barrio') }}
				{{ Former::text('address2')->label('Dirección') }} --}}

			</div>
			<div class="col-md-4">
				<legend><b>Contactos</b></legend>
				{{-- {{ Former::legend('Contactos') }} --}}
				<div data-bind='template: { foreach: contacts,
			                            beforeRemove: hideContact,
			                            afterAdd: showContact }'>
					{{ Former::hidden('public_id')->data_bind("value: public_id, valueUpdate: 'afterkeydown'") }}

					{{-- <label>Dirección</label>
 					<input type="text" pattern="" name="address2" class="form-control" id="address2" placeholder="Dirección del Cliente" aria-describedby="sizing-addon2" required title="Ingrese la Dirección"> --}}
					{{ Former::text('first_name')->label('Nombre(s)')->data_bind("value: first_name, valueUpdate: 'afterkeydown'") }}
					{{ Former::text('last_name')->label('Apellidos')->data_bind("value: last_name, valueUpdate: 'afterkeydown'") }}
					{{ Former::text('email')->label('Correo electrónico')->data_bind('value: email, valueUpdate: \'afterkeydown\', attr: {id:\'email\'+$index()}') }}
					{{ Former::text('phone')->label('Celular')->data_bind("value: phone, valueUpdate: 'afterkeydown'")->title('Solo se acepta Número Telefónico') }}

					<div class="form-group">
						<div class="col-lg-8 col-lg-offset-4 bold">
							<span class="redlink bold" data-bind="visible: $parent.contacts().length > 1">
								{{ link_to('#', 'Eliminar contacto'.' -', array('data-bind'=>'click: $parent.removeContact')) }}
							</span>					
							<span data-bind="visible: $index() === ($parent.contacts().length - 1)" class="pull-right greenlink bold">
								{{ link_to('#', 'Añadir contacto'.' +', array('onclick'=>'return addContact()')) }}
							</span>
						</div>
					</div>

				</div>

				{{ Former::legend('Información adicional') }}
					@if ($customLabel9)
						{{ Former::text('custom_value9')->label($customLabel9) }}
					@endif
					@if ($customLabel10)
						{{ Former::text('custom_value10')->label($customLabel10) }}
					@endif
					@if ($customLabel11)
						{{ Former::date('custom_value11')->label($customLabel11) }}
					@endif
					@if ($customLabel12)
						{{ Former::date('custom_value12')->label($customLabel12) }}
				@endif

				{{ Former::textarea('private_notes')->label('Antecedentes') }}

			</div>

		</div>

		{{ Former::textarea('data')->data_bind("value: ko.toJSON(model)") }}	

		<center class="buttons">

			<a href="{{ url('clientes/' . ($client ? $client->public_id : '')) }}" class="btn btn-default"> Cancelar </a>
	    	<button type="submit" class="btn btn-success dropdown-toggle"> Guardar </button>

		</center>
		{{ Former::close() }}

	</div>
</div>

<script type="text/javascript">

	$(function() {
		$('#country_id').combobox();
	});

	function ContactModel(data) {
		var self = this;
		self.public_id = ko.observable('');
		self.first_name = ko.observable('');
		self.last_name = ko.observable('');
		self.email = ko.observable('');
		self.phone = ko.observable('');

		if (data) {
			ko.mapping.fromJS(data, {}, this);			
		}		
	}

	function ContactsModel(data) {
		var self = this;
		self.contacts = ko.observableArray();;
		
		self.mapping = {
		    'contacts': {
		    	create: function(options) {
		    		return new ContactModel(options.data);
		    	}
		    }
		}		

		if (data) {
			ko.mapping.fromJS(data, self.mapping, this);			
		} else {
			self.contacts.push(new ContactModel());
		}
	}

	window.model = new ContactsModel({{ $client }});

	model.showContact = function(elem) { if (elem.nodeType === 1) $(elem).hide().slideDown() }
	model.hideContact = function(elem) { if (elem.nodeType === 1) $(elem).slideUp(function() { $(elem).remove(); }) }

	ko.applyBindings(model);

	function addContact() {
		model.contacts.push(new ContactModel());
		return false;
	}

	model.removeContact = function() {
		model.contacts.remove(this);
	}

</script>

@stop
