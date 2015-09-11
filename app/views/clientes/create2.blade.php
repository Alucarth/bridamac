@extends('header')

@section('title')Nuevo Cliente @stop

@section('head') @stop

@section('encabezado') 	CLIENTES @stop

@section('encabezado_descripcion') Nuevo Cliente  @stop 

@section('nivel') <li><a href="{{URL::to('clientes')}}"><i class="ion-person"></i> Clientes</a></li>
            <li class="active"> Nuevo </li> @stop

@section('content')

		{{ Former::open('clientes')->method('POST') }}

        <p></p>
        <div class="panel panel-default" >
          
          <div class="panel-heading">
            <h3 class="panel-title">Panel</h3>
          </div>

          <div class="panel-body">
            Consola Knout js

            <h1>Keyrus Work!</h1>


            <table  name="contactos[][]">
				<tbody name="contactos[][]" data-bind="foreach: setContactos">
    				<tr>
    						<!-- <input class="form-control" data-bind="value: nombre" /> -->
    						<!-- <input class="form-control" data-bind="value: telefono" /> -->

    						<td > <input name="contacto[][id].contact_name" class="form-control " data-bind="value: nombre" /> </td>
    				</tr>
    				<tr><td><p></p><t></tr>
    				<tr>
        					<td > <input name="contacto[][telefono].contact_telefono" class="form-control " data-bind="value: telefono" /></td>
    				</tr>
    				<tr><td> <a href="#" data-bind="click: $root.removerContacto"> eliminar</a></td></tr>
    				<tr><td><p></p><p></p><t></tr>
    			</tbody>
			</table>

			<button type="button" data-bind="click: addContacto" class="btn btn-primary" >Adicionar </button>

          </div>
        </div>
        	<button type="submit"  class="btn btn-success" >Enviar </button>
   		{{ Former::close()}}

	 <script type="text/javascript">
  
		function Contacto(nombre,telefono)
		{
			var self = this;
			self.nombre =nombre;
			self.telefono =telefono;			
		}
		function Contactos()
		{
			var self = this;
			self.setContactos = ko.observableArray([new Contacto("david","torrez"),new Contacto("dilan","rata")]);
		
			 self.addContacto = function() {
			        self.setContactos.push(new Contacto("elune"," asdasd"));
			    }
	       self.removerContacto = function(contacto){
                self.setContactos.remove(contacto);
              };
		}
		


		// Activates knockout.js
		ko.applyBindings(new Contactos());
       

    </script>
@stop