@extends('header')
@section('title')Editar Cliente @stop
  @section('head') @stop
@section('encabezado') CLIENTES @stop
@section('encabezado_descripcion') Editar Cliente:  {{$client->name}} @stop
@section('nivel') <li><a href="{{URL::to('clientes')}}"><i class="ion-person-stalker"></i> Clientes</a></li>
            <li class="active">Editar </li> @stop
@section('content')

{{Former::framework('TwitterBootstrap3')}}

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Datos del Cliente </h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      {{-- <span class="label label-primary">Label</span> --}}
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    {{ Former::open($url)->method('PUT') }}


		<div class="row">
			<div class="col-md-4">
				{{-- {{ Former::legend('Datos de Cliente') }} --}}
				<p>
					<label>Nombre *</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Cliente" aria-describedby="sizing-addon2" title="Ingrese el nombre del cliente"pattern="[a-zA-ZÑñÇç. ].{2,}" value='{{$client->name}}' required>
				</p>
				{{-- {{ Former::text('name')->label('Nombre') }}      --}}
				{{-- {{ Former::text('work_phone')->label('Teléfono')->title('Solo se acepta Número Telefónico') }} --}}
				<p>
				{{-- <div class="form-group">
				  <div class="col-md-6"> --}}
					<label >Teléfono</label>
					<input type="text" name="work_phone" id="work_phone"class="form-control" placeholder="Teléfono del Cliente" aria-describedby="sizing-addon2" title="Ingrese el número telefónico del cliente" value='{{$client->work_phone}}'>
				  {{--  </div>
				</div> --}}
				</p>

				 @if($cuenta->custom_client_label1)
                                    <p>
                                        <label>{{$cuenta->custom_client_label1}}</label>
                                        <input type="text" name="l1" class="form-control" value="{{$client->custom_value1}}" placeholder="{{$cuenta->custom_client_label1}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label2)
                                    <p>
                                        <label>{{$cuenta->custom_client_label2}}</label>
                                        <input type="text" name="l2" class="form-control" value="{{$client->custom_value2}}"placeholder="{{$cuenta->custom_client_label2}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label3)
                                    <p>
                                        <label>{{$cuenta->custom_client_label3}}</label>
                                        <input type="text" name="l3" class="form-control" value="{{$client->custom_value3}}"placeholder="{{$cuenta->custom_client_label3}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label4)
                                    <p>
                                        <label>{{$cuenta->custom_client_label4}}</label>
                                        <input type="text" name="l4" class="form-control"value="{{$client->custom_value4}}" placeholder="{{$cuenta->custom_client_label4}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label5)
                                    <p>
                                        <label>{{$cuenta->custom_client_label5}}</label>
                                        <input type="text" name="l5" class="form-control" value="{{$client->custom_value5}}"placeholder="{{$cuenta->custom_client_label5}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label6)
                                    <p>
                                        <label>{{$cuenta->custom_client_label6}}</label>
                                        <input type="text" name="l6" class="form-control" value="{{$client->custom_value6}}"placeholder="{{$cuenta->custom_client_label6}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
				@if($cuenta->custom_client_label7)
                                    <p>
                                        <label>{{$cuenta->custom_client_label7}}</label>
                                        <input type="text" name="l7" class="form-control" value="{{$client->custom_value7}}" placeholder="{{$cuenta->custom_client_label7}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label8)
                                    <p>
                                        <label>{{$cuenta->custom_client_label8}}</label>
                                        <input type="text" name="l8" class="form-control" value="{{$client->custom_value8}}"placeholder="{{$cuenta->custom_client_label8}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label9)
                                    <p>
                                        <label>{{$cuenta->custom_client_label9}}</label>
                                        <input type="text" name="l9" class="form-control" value="{{$client->custom_value9}}"placeholder="{{$cuenta->custom_client_label9}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label10)
                                    <p>
                                        <label>{{$cuenta->custom_client_label10}}</label>
                                        <input type="text" name="l10" class="form-control"value="{{$client->custom_value10}}" placeholder="{{$cuenta->custom_client_label10}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label11)
                                    <p>
                                        <label>{{$cuenta->custom_client_label11}}</label>
                                        <input type="text" name="l11" class="form-control" value="{{$client->custom_value11}}"placeholder="{{$cuenta->custom_client_label11}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
                                @if($cuenta->custom_client_label12)
                                    <p>
                                        <label>{{$cuenta->custom_client_label12}}</label>
                                        <input type="text" name="l12" class="form-control" value="{{$client->custom_value12}}"placeholder="{{$cuenta->custom_client_label12}}" aria-describedby="sizing-addon2">
                                    </p>
                                @endif
				{{-- {{ Former::legend('Datos para Facturar') }} --}}
				<legend>Datos para Facturar</legend>
				<p>
				{{-- <div class="form-group">
				  <div class="col-md-5"> --}}
					<label>Razón Social *</label>
					<input type="text" name="business_name" id="business_name" class="form-control" placeholder="Razón Social del Cliente" aria-describedby="sizing-addon2" title="Ingrese la Razón Social" pattern=".{3,}" value='{{$client->business_name}}' required>
				  {{--  </div>
				</div> --}}
				</p>

				{{-- {{ Former::text('business_name')->label('razón Social') }} --}}
				<p>
			{{-- 	<div class="form-group">
				  <div class="col-md-4"> --}}
					<label >NIT/CI *</label>
					<input type="text" name="nit" id="work_phone"class="form-control" placeholder="NIT o CI del Cliente" aria-describedby="sizing-addon2" title="Ingrese el NIT" pattern="([0-9]).{6,11}" value='{{$client->nit}}' required>
				  {{--  </div>
				</div> --}}
				</p>

				{{-- {{ Former::text('nit')->label('NIT/CI') }} --}}
				<legend>Dirección</legend>
				<p>
 					<label>Zona/Barrio</label>
 					<input type="text" name="address1" id="address1" class="form-control" placeholder="Dirección de la Zona/Barrio del Cliente" aria-describedby="sizing-addon2" title="Ingrese el nombre de Zona/Barrio" value='{{$client->address1}}' >
 					<label>Dirección</label>
 					<input type="text" name="address2" class="form-control" id="address2" placeholder="Dirección del Cliente" aria-describedby="sizing-addon2"  title="Ingrese la Dirección" value='{{$client->address2}}' >

				</p>
			{{-- 	{{ Former::legend('address') }}
				{{ Former::text('address1')->label('Zona/Barrio') }}
				{{ Former::text('address2')->label('Dirección') }} --}}

			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<legend>Contactos</legend>
				{{-- {{ Former::legend('Contactos') }} --}}

				<table class="col-md-9">
						<tbody  data-bind="foreach: setContactos">
							<tr>
								<td><input type="hidden" name="contactos[id][]"class="form-control " data-bind="value: id" /></td>
							</tr>
		    				<tr>
		    						<td > <label>Nombres </label> <input name="contactos[first_name][]"  class="form-control " data-bind="value: nombres" placeholder="Nombre del Contacto" pattern="[a-zA-ZÑñÇç. ].{2,}"/> </td>

		    				</tr>
		    				<tr><td><p></p></td></tr>
				            <tr>

				                <tr>
		    						<td > <label>Apellidos </label> <input name="contactos[last_name][]"  class="form-control " data-bind="value: apellidos" placeholder="Apellidos del Contacto" pattern="[a-zA-ZÑñÇç. ].{2,}"/> </td>

		    				</tr>

				            </tr>
				            <tr><td><p></p></td></tr>
				            <tr>

				                <td><label>Correo </label><input name="contactos[email][]" class="form-control " data-bind="value: correo" placeholder="Correo del Contacto" type=email/> </td>

				            </tr>
				            <tr><td><p></p></td></tr>
				            <tr>

				                <td><label>Télefono </label><input name="contactos[phone][]" class="form-control " data-bind="value: telefono" placeholder="Teléfono del Contacto"/> </td>

				            </tr>
                    <tr><td><p></p></td></tr>
                    <tr>

                        <td><label>Cargo </label><input name="contactos[position][]" class="form-control " data-bind="value: position" placeholder="Cargo del Contacto"/> </td>

                    </tr>

		    				<tr><td><p></p><center><a href="#" data-bind="click: $root.removerContacto"> - Eliminar Contacto</a></center></td></tr>
		    				<tr><td><p></p></td></tr>


		    			</tbody>


				</table>

				<div class="col-md-10">
					<a href="#" data-bind="click: addContacto"> + Añadir Contacto</a>
				</div>


				<label>Antecedentes</label><br>

				<textarea name="private_notes" class="form-control" cols="50" rows="3"placeholder="Ingrese Antecedentes">{{$client->private_notes}}</textarea>
				{{-- {{ Former::textarea('private_notes')->label('Antecedentes') }} --}}

			</div>

		</div>



		<p></p>
		<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                 <a href="{{ url('clientes') }}" class="btn btn-default btn-sm btn-block">Cancelar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-remove">  </span></a>
                 {{-- /' . ($client ? $client->public_id : '') --}}
            </div>
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-success dropdown-toggle btn-sm btn-block"> Guardar&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-floppy-disk"></span></button>
            </div>
        </div>



		{{ Former::close() }}
  </div><!-- /.box-body -->
  <div class="box-footer">
    Nota: (*) Campos Requeridos.
  </div><!-- box-footer -->
</div><!-- /.box -->

<script type="text/javascript">

	function Contacto(id,nombres,apellidos,correo,telefono, position)
	{
		var self = this;
		  self.id = id;
		  self.nombres = nombres;
		  self.apellidos = apellidos;
		  self.correo = correo;
		  self.telefono = telefono;
      self.position = position;
	}
	function Contactos()
	{
		var self = this;
		self.contactos = <?php echo json_encode($contactos);?>;
		console.log(self.contactos);

		console.log(self.contactos.length)

		self.setContactos = ko.observableArray();
		if(self.contactos.length>0)
		{
			for (var i = 0; i < self.contactos.length; i++) {

      console.log(self.contactos[i]);
			self.setContactos.push(new Contacto(self.contactos[i].id,self.contactos[i].nombres,self.contactos[i].apellidos,self.contactos[i].email,self.contactos[i].phone, self.contactos[i].position));
			};
		}



		self.addContacto = function() {
		        self.setContactos.push(new Contacto("","","","","",""));
		    };

        self.removerContacto = function(contacto){
            self.setContactos.remove(contacto);
          };
	}



	// Activates knockout.js
	ko.applyBindings(new Contactos());

</script>

@stop
